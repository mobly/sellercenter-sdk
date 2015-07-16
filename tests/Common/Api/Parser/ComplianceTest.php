<?php namespace SellerCenter\Test\SDK\Common\Api\Parser;

use GuzzleHttp\Command\Command;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use SellerCenter\SDK\Common\Api\Response\Success\Body;
use SellerCenter\SDK\Common\Api\Response\Success\Head;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;
use SellerCenter\SDK\Common\Api\Service;
use SellerCenter\Test\SDK\SdkTestCase;
use SellerCenter\Test\SDK\UsesServiceTrait;

/**
 * Class ComplianceTest
 *
 * @package SellerCenter\SDK\Common\Api\Parser
 * @author  Daniel Costa
 */
class ComplianceTest extends SdkTestCase
{
    use UsesServiceTrait;

    public function caseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/output/*.php');
        foreach ($files as $file) {
            $data = require_once $file;
            foreach ($data as $suite) {
                $suite['metadata']['type'] = $suite['metadata']['protocol'];
                foreach ($suite['cases'] as $case) {
                    $description = new Service(function () use ($suite, $case) {
                        return [
                            'metadata'   => $suite['metadata'],
                            'operations' => [
                                $case['given']['name'] => $case['given']
                            ]
                        ];
                    }, 'service', 'store', 'environment');
                    $cases[$suite['description'] . ':' . $case['given']['name']] = [
                        $description,
                        $case['given']['name'],
                        $case['given']['deserialize'],
                        $case['result'],
                        $case['response']
                    ];
                }
            }
        }

        return $cases;
    }

    /**
     * @dataProvider caseProvider
     */
    public function testPassesComplianceTest(Service $service, $name, $deserialize, array $expectedResult, $response)
    {
        $parser = Service::createParser($service);

        // Create a response based on the serialized property of the test.
        $response = new Response(
            $response['status_code'],
            $response['headers'],
            Stream::factory($response['body'])
        );
        $parsedResult = $parser($response, $deserialize);

        $expectedHead = new Head;
        $expectedHead->setRequestId($expectedResult['Head']['RequestId']);
        $expectedHead->setRequestAction($expectedResult['Head']['RequestAction']);
        $expectedHead->setResponseType($expectedResult['Head']['ResponseType']);
        $expectedHead->setRequestParameters($expectedResult['Head']['RequestParameters']);

        $expectedResponse = new $deserialize();
        $expectedResponse->setHead($expectedHead);
        $expectedResponse->setBody($expectedResult['Body']);

        $this->assertEquals($expectedResponse->getHead(), $parsedResult->getHead());
        $this->assertEquals(count($expectedResponse->getBody()->toArray()), count($parsedResult->getBody()));
    }
}
