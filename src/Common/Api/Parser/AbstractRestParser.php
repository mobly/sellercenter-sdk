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
     * @param ResponseInterface $response Response to parse
     * @param string            $deserialize
     *
     * @return mixed
     */
    abstract protected function parse(ResponseInterface $response, $deserialize);

    /**
     * @param ResponseInterface $response
     * @param string            $deserialize
     *
     * @return mixed
     */
    public function __invoke(ResponseInterface $response, $deserialize)
    {
        return $this->parse($response, $deserialize);
    }
}
