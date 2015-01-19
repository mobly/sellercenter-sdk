<?php

namespace SellerCenter\SDK\Test\Product;

use SellerCenter\SDK\Product\ImageUriCollection;

/**
 * ImageUriCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ImageUriCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddInvalidItemShouldThrowInvalidArgumentException()
    {
        $collection = new ImageUriCollection;
        $collection->add(1);
    }
}
