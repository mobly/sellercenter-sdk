<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\SDK\Product\Product;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * ProductCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ProductCollectionTest extends SdkTestCase
{
    public function testAdd()
    {
        $collection = new ProductCollection();
        $collection->add(new Product());
        $this->assertEquals(1, $collection->count());
    }

    public function testToArray()
    {
        $collection = new ProductCollection();
        $product = new Product();
        $product->setSellerSku('123ABCMOB');
        $collection->add($product);
        $expected = [
            [
                'SellerSku' => '123ABCMOB'
            ]
        ];
        $this->assertEquals($expected, $collection->toArray());
    }
}
