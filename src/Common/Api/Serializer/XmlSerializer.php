<?php

namespace SellerCenter\SDK\Common\Api\Serializer;

use JMS\Serializer\SerializerBuilder;

/**
 * Class XmlSerializer
 *
 * @package SellerCenter\SDK\Common\Api\Serializer
 * @author Daniel Costa
 */
class XmlSerializer
{
    /**
     * Builds the XML body based on an anotated class.
     *
     * @param $class
     *
     * @return string
     */
    public function serialize($class)
    {
        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();
        $serializer = SerializerBuilder::create()->build();

        return $serializer->serialize($class, 'xml');
    }
}
