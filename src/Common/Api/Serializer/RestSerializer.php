<?php

namespace SellerCenter\SDK\Common\Api\Serializer;

use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Url;
use SellerCenter\SDK\Common\Api\Service;

/**
 * Class RestSerializer
 *
 * @package SellerCenter\SDK\Common\Api\Serializer
 * @author  Daniel Costa
 */
abstract class RestSerializer
{
    /** @var Service */
    private $api;

    /** @var Url */
    private $endpoint;

    /**
     * @param Service $api      Service API description
     * @param string  $endpoint Endpoint to connect to
     */
    public function __construct(Service $api, $endpoint)
    {
        $this->api = $api;
        $this->endpoint = Url::fromString($endpoint);
    }

    public function getEvents()
    {
        return ['prepared' => ['onPrepare']];
    }

    public function __invoke(CommandTransaction $trans)
    {
        $command = $trans->command;
        $operation = $this->api->getOperation($command->getName());
        $args = $command->toArray();

        $request = $trans->client->createRequest(
            $operation['http']['method'],
            $this->buildEndpoint($operation, $args),
            ['config' => ['command' => $command]]
        );

        return $this->serialize($request, $operation, $args);
    }

    /**
     * Applies a payload body to a request.
     *
     * @param RequestInterface $request Request to apply.
     * @param string           $name    Member to serialize
     * @param array            $args    Value to serialize
     *
     * @return \GuzzleHttp\Stream\StreamInterface
     */
    abstract protected function payload(
        RequestInterface $request,
        $name,
        array $args
    );

    private function serialize(
        RequestInterface $request,
        $operation,
        array $args
    ) {
//        var_dump('('.__LINE__.')'.__FUNCTION__, $operation, $args); die;
        foreach ($operation['parameters'] as $name => $value) {
            $location = $value['location'];
            if (!in_array($location, ['header', 'querystring', 'headers', 'uri'])) {
                $this->payload($request, $name, $args[$name]);
            }
        }

//        var_dump('('.__LINE__.')'.__FUNCTION__, $request->getBody()->getContents()); die;

        return $request;
    }

    /**
     * Builds the URI template for a REST based request.
     *
     * @param array $operation
     * @param array $args
     *
     * @return array
     */
    private function buildEndpoint($operation, array $args)
    {
        $uri = (string) $this->endpoint;
        $varspecs = [];

        if (isset($operation['http']['requestUri'])) {
            $uri = $this->endpoint->combine($operation['http']['requestUri']);

            // Create an associative array of varspecs used in expansions
            if (isset($operation['parameters'])) {
                foreach ($operation['parameters'] as $name => $member) {
                    if ($member['location'] == 'uri') {
                        $varspecs[isset($member['locationName']) ? $member['locationName'] : $name] =
                            isset($args[$name]) ? $args[$name] : null;
                    }
                }
            }
        }

        return preg_replace_callback(
            '/%7B([^\}]+)%7D/',
            function (array $matches) use ($varspecs) {
                $isGreedy = substr($matches[1], -1, 1) == '+';
                $k = $isGreedy ? substr($matches[1], 0, -1) : $matches[1];
                if (!isset($varspecs[$k])) {
                    return '';
                } elseif ($isGreedy) {
                    return str_replace('%2F', '/', rawurlencode($varspecs[$k]));
                } else {
                    return rawurlencode($varspecs[$k]);
                }
            },
            $uri
        );
    }
}
