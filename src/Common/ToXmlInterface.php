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
     * Get the array representation of an object
     *
     * @return string
     */
    public function toXml();
}
