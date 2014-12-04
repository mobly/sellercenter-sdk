<?php

namespace SellerCenter\SDK\Product;

/**
 * ImageCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ImageCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddInvalidItemShouldThrowInvalidArgumentException()
    {
        $collection = new ProductImageCollection();
        $collection->add(1);
    }

    public function testAddImageToCollection()
    {
        $image = new ProductImage;
        $image->setSellerSku('12345');
        $collection = new ProductImageCollection;
        $collection->add($image);
        $this->assertEquals($collection->count(), 1);
    }
}
