<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\ImageUri;
use SellerCenter\SDK\Product\ImageUriCollection;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * ImageUriCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ImageUriCollectionTest extends SdkTestCase
{
    public function testToArray()
    {
        $collection = new ImageUriCollection;
        $collection->add(new ImageUri('http://host.com/img.jpg'));

        $expected = ['http://host.com/img.jpg'];
        $this->assertEquals($expected, $collection->toArray());
    }
}
