<?php namespace SellerCenter\Test\SDK;

use SellerCenter\SDK\Common\SdkClientInterface;
use SellerCenter\SDK\Common\Result;
use SellerCenter\SDK\Common\Api\Service;
use GuzzleHttp\Ring\Client\MockHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Command\Exception\CommandException;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Mock;
use SellerCenter\SDK\Sdk;

trait UsesServiceTrait
{
    /**
     * Creates an instance of the SellerCenter SDK for a test
     *
     * @param array $args
     *
     * @return Sdk
     */
    private function getTestSdk(array $args = [])
    {
        return new Sdk($args + [
                'store'       => 'mobly',
                'environment' => 'staging',
                'credentials' => [
                    'id' => 'admin@sellercenter.net',
                    'key' => 'abc16cfd7e7fa8263b8b83eb3b4467e60ca0638b'
                ],
                'retries'     => false
            ]);
    }

    /**
     * Creates an instance of a service client for a test
     *
     * @param string $service
     * @param array  $args
     *
     * @return SdkClientInterface
     */
    private function getTestClient($service, array $args = [])
    {
        // Disable network access. If the INTEGRATION envvar is set, then this
        // disabling is not done.
        if (!isset($args['client']) && !isset($_SERVER['INTEGRATION'])) {
            $args['client'] = new Client([
                'handler' => new MockHandler(function () {
                    return ['error' => new \RuntimeException('No network access')];
                })
            ]);
        }

        return $this->getTestSdk()->getClient($service, $args);
    }

    /**
     * Queues up mock Result objects for a client
     *
     * @param SdkClientInterface $client
     * @param Result[]|array[]   $results
     *
     * @return SdkClientInterface
     */
    private function addMockResults(SdkClientInterface $client, array $results)
    {
        $client->getEmitter()->on(
            'prepared',
            function (PreparedEvent $event) use (&$results) {
                $result = array_shift($results);
                if (is_array($result)) {
                    $event->intercept(new Result($result));
                } elseif ($result instanceof Result) {
                    $event->intercept($result);
                } elseif ($result instanceof CommandException) {
                    throw $result;
                } else {
                    throw new \Exception(
                        'There are no more mock results left. This client executed more commands than expected.'
                    );
                }
            },
            'last'
        );

        return $client;
    }

    /**
     * Queues up mock HTTP Response objects for a client
     *
     * @param SdkClientInterface $client
     * @param Response[]         $responses
     * @param bool               $readBodies
     *
     * @return SdkClientInterface
     * @throws \InvalidArgumentException
     */
    private function addMockResponses(
        $client,
        array $responses,
        $readBodies = true
    ) {
        $mock = new Mock($responses, $readBodies);
        $client->getHttpClient()->getEmitter()->attach($mock);

        return $client;
    }

    /**
     * Creates a mock CommandException with a given error code
     *
     * @param string $code
     * @param string $type
     * @param string|null $message
     *
     * @return CommandException
     */
    private function createMockSdkException(
        $code = 'ERROR',
        $type = 'SellerCenter\SDK\Common\Exception\SdkException',
        $message = null
    ) {
        $client = $this->getMockBuilder('SellerCenter\SDK\Common\SdkClientInterface')
            ->setMethods(['getApi'])
            ->getMockForAbstractClass();

        $client->expects($this->any())
            ->method('getApi')
            ->will($this->returnValue(
                new Service(
                    function () {
                        return [
                            'metadata' => [
                                'endpointPrefix' => 'foo'
                            ]
                        ];
                    },
                    'service',
                    'version'
                )));

        $trans = new CommandTransaction(
            $client,
            $this->getMock('GuzzleHttp\Command\CommandInterface'),
            [
                'api_error' => [
                    'message' => $message ?: 'Test error',
                    'code'    => $code
                ]
            ]
        );

        return new $type($message ?: 'Test error', $trans);
    }
}
