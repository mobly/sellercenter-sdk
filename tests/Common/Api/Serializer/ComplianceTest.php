<?php namespace SellerCenter\Test\SDK\Common\Api\Serializer;

use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;
use SellerCenter\SDK\Common\Api\Service;
use SellerCenter\SDK\Common\ClientFactory;
use SellerCenter\SDK\Common\Credentials\NullCredentials;
use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\Test\SDK\SdkTestCase;
use SellerCenter\Test\SDK\UsesServiceTrait;

/**
 * Class ComplianceTest
 *
 * @package SellerCenter\SDK\Common\Api\Serializer
 * @author  Daniel Costa
 */
class ComplianceTest extends SdkTestCase
{
    use UsesServiceTrait;

    public function caseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/input/*.php');
        foreach ($files as $file) {
            $data = require_once $file;
            foreach ($data as $suite) {
                $suite['metadata']['type'] = $suite['metadata']['protocol'];
                foreach ($suite['cases'] as $case) {
                    $description = new Service(function () use ($suite, $case) {
                        return [
                            'metadata' => $suite['metadata'],
                            'operations' => [
                                $case['given']['name'] => $case['given']
                            ]
                        ];
                    }, 'service', 'store', 'environment');
                    $cases[$suite['description'] . ':' . $case['given']['name']] = [
                        $file . ': ' . $suite['description'] . ':' . $case['given']['name'],
                        $description,
                        $case['given']['name'],
                        $case['params'],
                        $case['serialized']
                    ];
                }
            }
        }

        return $cases;
    }

    /**
     * @dataProvider caseProvider
     *
     * @param         $about
     * @param Service $service
     * @param         $name
     * @param array   $args
     * @param         $serialized
     */
    public function testPassesComplianceTest($about, Service $service, $name, array $args, $serialized)
    {
        $endpoint = 'https://api-staging.sellercenter.net';

        $client = new SdkClient([
            'api' => $service,
            'credentials' => new NullCredentials,
            'client' => new Client,
            'signature' => $this->getMock('SellerCenter\SDK\Commom\Signature\SignatureInterface'),
            'store' => 'mobly',
            'environment' => 'staging',
            'endpoint' => $endpoint,
            'error_parser' => Service::createErrorParser($service->getProtocol()),
            'serializer' => Service::createSerializer($service, $endpoint),
            'version' => 'latest'
        ]);

        $factory = new ClientFactory();
        /* @var \SellerCenter\SDK\Common\ClientFactory $reflectionClass */
        /* @var \ReflectionClass $reflectionClass */
        $reflectionClass = new \ReflectionClass($factory);
        $reflectionMethod = $reflectionClass->getMethod('applyParser');
        $reflectionMethod->setAccessible(true);

        $reflectionMethod->invoke($factory, $client, 'http://foo.com');
        $command = $client->getCommand($name, $args);
        $transaction = new CommandTransaction($client, $command);
        /** @var callable $serializer */
        $serializer = $this->readAttribute($client, 'serializer');
        $request = $serializer($transaction);

        $this->assertEquals($serialized['uri'], $request->getResource());

        $body = (string) $request->getBody();
        if (!empty($body) && $service->getMetadata('type') == 'rest-xml') {
            $this->assertXmlStringEqualsXmlString($serialized['body'], $body);
        }

        if (isset($serialized['headers'])) {
            foreach ($serialized['headers'] as $key => $value) {
                $this->assertSame($value, $request->getHeader($key));
            }
        }
    }
}
