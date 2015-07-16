<?php namespace SellerCenter\Test\SDK\Common;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Mock;
use SellerCenter\SDK\Common\Api\Service;
use SellerCenter\SDK\Common\Credentials\Credentials;
use SellerCenter\SDK\Common\Exception\SdkException;
use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Common\Signature\SignatureV1;
use SellerCenter\SDK\Product\ProductClient;
use SellerCenter\Test\SDK\SdkTestCase;
use SellerCenter\Test\SDK\UsesServiceTrait;

/**
 * Class SdkClientTest
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class SdkClientTest extends SdkTestCase
{
    use UsesServiceTrait;

    public function testHasGetters()
    {
        $config = [
            'client'       => new Client(),
            'credentials'  => new Credentials('admin@sellercenter.net', 'abc16cfd7e7fa8263b8b83eb3b4467e60ca0638b'),
            'signature'    => new SignatureV1('foo', 'bar'),
            'store'        => 'mobly',
            'environment'  => 'staging',
            'serializer'   => function () {},
            'api'          => new Service(function () {}, 'foo', 'bar'),
            'error_parser' => function () {},
            'version'      => 'latest',
            'endpoint'     => 'https://api-staging.sellercenter.net'
        ];

        $client = new SdkClient($config);
        $this->assertSame($config['client'], $client->getHttpClient());
        $this->assertSame($config['credentials'], $client->getCredentials());
        $this->assertSame($config['signature'], $client->getSignature());
        $this->assertSame($config['store'], $client->getStore());
        $this->assertSame($config['api'], $client->getApi());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage is a required option
     */
    public function testEnsuresRequiredArgumentsArePresent()
    {
        new SdkClient([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Operation not found: Foo
     */
    public function testEnsuresOperationIsFoundWhenCreatingCommands()
    {
        $this->createClient()->getCommand('foo');
    }

    public function testReturnsCommandForOperation()
    {
        $client = $this->createClient(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'GuzzleHttp\Command\CommandInterface',
            $client->getCommand('foo')
        );
    }

    public function testMergesDefaultCommandParameters()
    {
        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]],
            ['defaults' => ['test' => '123']]
        );
        $command = $client->getCommand('foo', ['bam' => 'boozled']);
        $this->assertEquals('123', $command['test']);
        $this->assertEquals('boozled', $command['bam']);
    }

    public function errorProvider()
    {
        return [
            [null, 'SellerCenter\SDK\Common\Exception\SdkException'],
            [
                'SellerCenter\SDK\Product\Exception\ProductException',
                'SellerCenter\SDK\Product\Exception\ProductException'
            ]
        ];
    }

    /**
     * @dataProvider errorProvider
     */
    public function testThrowsSpecificErrors($value, $type)
    {
        $apiProvider = function () {
            return ['operations' => ['foo' => [
                'http' => ['method' => 'POST']
            ]]];
        };
        $service = new Service($apiProvider, 'foo', 'bar');

        $c = new Client();
        $client = new SdkClient([
            'client'          => $c,
            'credentials'     => new Credentials('admin@sellercenter.net', 'abc16cfd7e7fa8263b8b83eb3b4467e60ca0638b'),
            'signature'       => new SignatureV1('foo', 'bar'),
            'store'           => 'mobly',
            'environment'     => 'staging',
            'exception_class' => $value,
            'api'             => $service,
            'version'         => 'latest',
            'serializer'      => function () use ($c) {
                return $c->createRequest('GET', 'http://httpbin.org');
            },
            'error_parser'    => function () {
                return [
                    'code' => 'foo',
                    'type' => 'bar',
                    'request_id' => '123'
                ];
            },
            'endpoint'        => 'https://api-staging.sellercenter.net'
        ]);

        $client->getHttpClient()->getEmitter()->attach(new Mock([
            new Response(404)
        ]));

        try {
            $client->foo();
            $this->fail('Did not throw an exception');
        } catch (SdkException $e) {
            $this->assertInstanceOf($type, $e);
            $this->assertEquals([
                'api_error' => [
                    'code' => 'foo',
                    'type' => 'bar',
                    'request_id' => '123'
                ]
            ], $e->getTransaction()->context->toArray());
            $this->assertEquals('foo', $e->getApiErrorCode());
            $this->assertEquals('bar', $e->getApiErrorType());
            $this->assertEquals('123', $e->getApiRequestId());
        }
    }

    /**
     * @expectedException \SellerCenter\SDK\Common\Exception\SdkException
     * @expectedExceptionMessage Uncaught exception while executing SellerCenter\SDK\Common\SdkClient::foo - Baz Bar!
     */
    public function testWrapsUncaughtExceptions()
    {
        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]]
        );
        $command = $client->getCommand('foo');
        $command->getEmitter()->on('init', function () {
            throw new \RuntimeException('Baz Bar!');
        });
        $client->execute($command);
    }

    /**
     * @expectedException \SellerCenter\SDK\Common\Exception\SdkException
     * @expectedExceptionMessage Error executing SellerCenter\SDK\Common\SdkClient::foo() on "http://foo.com"; Baz Bar!
     */
    public function testHandlesNetworkingErrorsGracefully()
    {
        $r = new Request('GET', 'http://foo.com');
        $client = $this->createClient(
            ['operations' => ['foo' => ['http' => ['method' => 'POST']]]],
            ['serializer' => function () use ($r) { return $r; }]
        );
        $command = $client->getCommand('foo');
        $command->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $e->getRequest()->getEmitter()->on('before', function () {
                throw new \RuntimeException('Baz Bar!');
            });
        });
        $client->execute($command);
    }

    public function testChecksBothLowercaseAndUppercaseOperationNames()
    {
        $client = $this->createClient(['operations' => ['Foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'GuzzleHttp\Command\CommandInterface',
            $client->getCommand('foo')
        );
    }

    public function testCanSpecifyDefaultCommandOptions()
    {
        $client = $this->createClient(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]], ['defaults' => ['baz' => 'bam']]);

        $c = $client->getCommand('foo');
        $this->assertEquals('bam', $c['baz']);
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetIteratorFailsForMissingConfig()
    {
        $client = $this->createClient();
        $client->getIterator('ListObjects');
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetPaginatorFailsForMissingConfig()
    {
        $client = $this->createClient();
        $client->getPaginator('ListObjects');
    }

    public function testCanGetWaiter()
    {
        $client = $this->createClient(['waiters' => ['PigsFly' => []]]);

        $this->assertInstanceOf(
            'SellerCenter\SDK\Common\Waiter\ResourceWaiter',
            $client->getWaiter('PigsFly', ['PigId' => 4])
        );
    }

    public function testCanWait()
    {
        $flag = false;
        $client = $this->createClient();

        $client->waitUntil(function () use (&$flag) {
            return $flag = true;
        });

        $this->assertTrue($flag);
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetWaiterRequiresWaiterFactory()
    {
        $client = $this->createClient();
        $client->waitUntil('PigsFly');
    }

    public function testCanGetEndpoint()
    {
        $client = $this->createClient();
        $this->assertEquals(
            'https://api-staging.sellercenter.net',
            $client->getEndpoint()
        );
    }

    public function testCanGetEnvironment()
    {
        $client = $this->createClient();
        $this->assertEquals(
            'staging',
            $client->getEnvironment()
        );
    }

    private function createClient(array $service = [], array $config = [])
    {
        $apiProvider = function ($type) use ($service, $config) {
            if ($type == 'paginator') {
                return isset($service['pagination'])
                    ? ['pagination' => $service['pagination']]
                    : ['pagination' => []];
            } elseif ($type == 'waiter') {
                return isset($service['waiters'])
                    ? ['waiters' => $service['waiters']]
                    : ['waiters' => []];
            } else {
                return $service;
            }
        };

        $api = new Service($apiProvider, 'service', 'store', 'environment');

        return new SdkClient($config + [
                'client'       => new Client(),
                'credentials'  => new Credentials('admin@sellercenter.net', 'abc16cfd7e7fa8263b8b83eb3b4467e60ca0638b'),
                'signature'    => new SignatureV1('foo', 'bar'),
                'store'        => 'mobly',
                'environment'  => 'staging',
                'serializer'   => function () {},
                'api'          => $api,
                'error_parser' => function () {},
                'version'      => 'latest',
                'endpoint'     => 'https://api-staging.sellercenter.net'
            ]);
    }

    /**
     * @covers SellerCenter\SDK\Common\SdkClient::factory
     */
    public function testFactoryInitializesClient()
    {
        /* @var \SellerCenter\SDK\Product\ProductClient $client */
        $client = ProductClient::factory([
            'store' => 'mobly',
            'environment' => 'staging'
        ]);
        $this->assertInstanceOf('SellerCenter\SDK\Product\ProductClient', $client);
        $this->assertEquals('mobly', $client->getStore());
    }
}
