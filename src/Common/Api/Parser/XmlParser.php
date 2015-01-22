<?php

namespace SellerCenter\SDK\Common\Api\Parser;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Exception;
use JMS\Serializer\SerializerBuilder;
use SimpleXMLElement;

/**
 * Class XmlParser
 *
 * @package SellerCenter\SDK\Common\Api\Parser
 * @author  Daniel Costa
 */
class XmlParser
{
    /**
     * @param SimpleXMLElement $value
     * @param string           $deserialize
     *
     * @return mixed
     */
    public function parse(SimpleXMLElement $value, $deserialize)
    {
        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            getcwd() . '/vendor/jms/serializer/src'
        );
        $serializer = SerializerBuilder::create()->build();

        return $serializer->deserialize($value->asXML(), $deserialize, 'xml');
    }
}
