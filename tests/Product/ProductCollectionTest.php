<?php

namespace SellerCenter\SDK\Test\Product;

use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\SDK\Product\Product;

/**
 * ProductCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ProductCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddInvalidItemShouldThrowInvalidArgumentException()
    {
        $collection = new ProductCollection();
        $collection->add(1);
    }

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
                'SellerSku' => '123ABCMOB',
            ]
        ];
        $this->assertEquals($expected, $collection->toArray());
    }

    public function testToXmlArray()
    {
        $collection = new ProductCollection();
        $product = new Product();
        $product->setSellerSku('123ABCMOB');
        $collection->add($product);
        $expected = [
            [
                'Product' => [
                    'SellerSku' => '123ABCMOB',
                ]
            ]
        ];
        $this->assertEquals($expected, $collection->toXmlArray());
    }
}
