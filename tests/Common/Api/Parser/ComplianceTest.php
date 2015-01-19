<?php

namespace SellerCenter\SDK\Test\Common\Api\Parser;

use GuzzleHttp\Command\Command;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use SellerCenter\SDK\Common\Api\Service;
use SellerCenter\SDK\Test\UsesServiceTrait;

/**
 * Class ComplianceTest
 *
 * @package SellerCenter\SDK\Common\Api\Parser
 * @author  Daniel Costa
 */
class ComplianceTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCaseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/output/*.json');
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
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
                    }, 'service', 'version');
                    $cases[] = [
                        $file . ': ' . $suite['description'],
                        $description,
                        $case['given']['name'],
                        $case['result'],
                        $case['response']
                    ];
                }
            }
        }

        return $cases;
    }

    /**
     * @dataProvider testCaseProvider
     */
    public function testPassesComplianceTest(
        $about,
        Service $service,
        $name,
        array $expectedResult,
        $res
    ) {
        $parser = Service::createParser($service);
        $command = new Command($name);

        // Create a response based on the serialized property of the test.
        $response = new Response(
            $res['status_code'],
            $res['headers'],
            Stream::factory($res['body'])
        );

        $result = $parser($command, $response)->toArray();

        $this->assertEquals($expectedResult, $result);
    }
}
