<?php

namespace SellerCenter\SDK\Common\Api\ErrorParser;

use GuzzleHttp\Message\ResponseInterface;
use JMS\Serializer\SerializerBuilder;

/**
 * Class XmlErrorParser
 *
 * @package SellerCenter\SDK\Common\Api\ErrorParser
 * @author  Daniel Costa
 */
class XmlErrorParser
{
    public function __invoke(ResponseInterface $response)
    {
        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();

        if (count($response->xml()->xpath('/ErrorResponse'))) {
            $serializer = SerializerBuilder::create()->build();
            return $serializer->deserialize(
                $response->xml()->asXML(),
                'SellerCenter\SDK\Common\Api\ErrorResponse',
                'xml'
            );
        }

        return;
    }
}
