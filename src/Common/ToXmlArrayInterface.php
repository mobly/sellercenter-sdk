<?php

namespace SellerCenter\SDK\Common;

/**
 * ToXmlArray Interface
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
interface ToXmlArrayInterface
{
    /**
     * Get the array representation of an object to be transformed in XML nodes
     *
     * @return string
     */
    public function toXmlArray();
}
