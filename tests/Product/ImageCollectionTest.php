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
        $collection = new ImageCollection();
        $collection->add(1);
    }

    public function testAddImageToCollection()
    {
        $image = new Image;
        $image->setSellerSku('12345');
        $collection = new ImageCollection;
        $collection->add($image);
        $this->assertEquals($collection->count(), 1);
    }
}
