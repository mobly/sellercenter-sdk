<?php

namespace SellerCenter\SDK\Common\Api\Parser;

use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Message\ResponseInterface;
use SellerCenter\SDK\Common\Result;

/**
 * Class AbstractRestParser
 *
 * @package SellerCenter\SDK\Common\Api\Parser
 * @author  Daniel Costa
 */
abstract class AbstractRestParser extends AbstractParser
{
    /**
     * Parses a payload from a response.
     *
     * @param ResponseInterface $response Response to parse.
     * @param array             $result   Result value
     *
     * @return mixed
     */
    abstract protected function payload(
        ResponseInterface $response,
        array &$result
    );

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        $result = [];

        $this->extractStatus($response, $result);
        $this->extractHeaders($response, $result);
        $this->extractPayload($response, $result);

        $payload = $result['payload'];
        unset($result['payload']);

        return new Result($result, $payload);
    }

    private function extractPayload(
        ResponseInterface $response,
        array &$result
    ) {
        // Streaming data is just the stream from the response body.
        $this->payload($response, $result);
    }

    /**
     * Extract a map of headers with an optional prefix from the response.
     *
     * @param ResponseInterface $response
     * @param                   $result
     */
    private function extractHeaders(
        ResponseInterface $response,
        &$result
    ) {
        // Check if the headers are prefixed by a location name
        $result['headers'] = [];

        foreach ($response->getHeaders() as $k => $values) {
            $result['headers'][$k] = implode(', ', $values);
        }
    }

    /**
     * Places the status code of the response into the result array.
     *
     * @param ResponseInterface $response
     * @param array             $result
     */
    private function extractStatus(
        ResponseInterface $response,
        array &$result
    ) {
        $result['status'] = (int) $response->getStatusCode();
    }
}
