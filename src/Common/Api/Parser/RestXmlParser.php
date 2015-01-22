<?php

namespace SellerCenter\SDK\Common\Api\Parser;

use GuzzleHttp\Message\ResponseInterface;
use SellerCenter\SDK\Common\Api\Service;

/**
 * Class RestXmlParser
 *
 * @package SellerCenter\SDK\Common\Api\Parser
 * @author  Daniel Costa
 */
class RestXmlParser extends AbstractRestParser
{
    /** @var XmlParser */
    private $parser;

    /**
     * @param Service   $api    Service description
     * @param XmlParser $parser XML body parser
     */
    public function __construct(Service $api, XmlParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new XmlParser();
    }

    /**
     * @param ResponseInterface $response
     * @param string            $deserialize
     *
     * @return mixed
     */
    protected function parse(ResponseInterface $response, $deserialize)
    {
        return $this->parser->parse($response->xml(), $deserialize);
    }
}
