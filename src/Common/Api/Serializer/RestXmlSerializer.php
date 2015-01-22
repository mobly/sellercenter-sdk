<?php

namespace SellerCenter\SDK\Common\Api\Serializer;

use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream\Stream;
use SellerCenter\SDK\Common\Api\Service;

/**
 * Class RestXmlSerializer
 *
 * @package SellerCenter\SDK\Common\Api\Serializer
 * @author  Daniel Costa
 */
class RestXmlSerializer extends RestSerializer
{
    /** @var XmlSerializer */
    private $serializer;

    /**
     * @param Service       $api        Service API description
     * @param string        $endpoint   Endpoint to connect to
     * @param XmlSerializer $serializer Optional XML formatter to use
     */
    public function __construct(Service $api, $endpoint, XmlSerializer $serializer = null)
    {
        parent::__construct($api, $endpoint);
        $this->serializer = $serializer ?: new XmlSerializer($api);
    }

    /**
     * @param RequestInterface $request
     * @param string           $name
     * @param mixed            $args
     */
    protected function payload(RequestInterface $request, $name, $args)
    {
        $request->setHeader('Content-Type', 'application/xml');
        $request->setBody(Stream::factory($this->serializer->serialize($args)));
    }
}
