<?php

namespace SellerCenter\SDK\Common\Api\ErrorParser;

use Doctrine\Common\Annotations\AnnotationRegistry;
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
        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            getcwd() . '/vendor/jms/serializer/src'
        );

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
