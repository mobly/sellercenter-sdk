<?php

namespace SellerCenter\SDK\Common\Api\Serializer;

use SellerCenter\SDK\Common\Api\Service;

/**
 * Class XmlBody
 *
 * @package SellerCenter\SDK\Common\Api\Serializer
 * @author Daniel Costa
 */
class XmlBody
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
     * Builds the XML body based on an array of arguments.
     *
     * @param string $name
     * @param array  $args Associative array of arguments
     *
     * @return string
     */
    public function build($name, array $args)
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');
        $this->format($name, $args, $xml);
        $xml->endDocument();

        return $xml->outputMemory();
    }

    private function format($name, $struct, \XMLWriter $xml, $previousNode = null)
    {
        $xml->startElement($name ?: $previousNode);

        if (is_array($struct)) {
            foreach ($struct as $key => $value) {
                if (is_int($key) && is_array($value)) {
                    foreach ($value as $loopKey => $loopValue) {
                        $this->format($loopKey, $loopValue, $xml, $name);
                    }
                } else {
                    $this->format($key, $value, $xml, $name);
                }
            }
        } else {
            $xml->writeRaw($struct);
        }

        $xml->endElement();
    }
}
