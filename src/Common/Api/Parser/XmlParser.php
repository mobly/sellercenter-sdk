<?php

namespace SellerCenter\SDK\Common\Api\Parser;

use SimpleXMLElement;

/**
 * Class XmlParser
 *
 * @package SellerCenter\SDK\Common\Api\Parser
 * @author  Daniel Costa
 */
class XmlParser
{
    public function parse(SimpleXMLElement $value)
    {
        return json_decode(json_encode(simplexml_load_string($value->asXML())), true);
    }
}
