<?php

namespace SellerCenter\SDK\Common\Api\Serializer;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use SellerCenter\SDK\Common\Api\Service;

/**
 * Class XmlSerializer
 *
 * @package SellerCenter\SDK\Common\Api\Serializer
 * @author Daniel Costa
 */
class XmlSerializer
{
    /** @var Service */
    private $api;

    /**
     * @param Service $api API being used to create the XML body.
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
    }

    /**
     * Builds the XML body based on an anotated class.
     *
     * @param $class
     *
     * @return string
     */
    public function serialize($class)
    {
        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            getcwd() . '/vendor/jms/serializer/src'
        );
        $serializer = SerializerBuilder::create()->build();

        return $serializer->serialize($class, 'xml');
    }
}
