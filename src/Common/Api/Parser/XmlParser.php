<?php namespace SellerCenter\SDK\Common\Api\Parser;

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
        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();
        $serializer = SerializerBuilder::create()->build();

        return $serializer->deserialize($value->asXML(), $deserialize, 'xml');
    }
}
