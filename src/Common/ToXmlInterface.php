<?php

namespace SellerCenter\SDK\Common;

/**
 * Interface ToXmlInterface
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
interface ToXmlInterface
{
    /**
     * Get the array representation of an object to be transformed in XML nodes
     *
     * @return string
     */
    public function toXml();
}
