<?php

namespace SellerCenter\SDK\Product;

/**
 * Image Test
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ProductImageTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetSellerSku()
    {
        $image = new ProductImage();
        $image->setSellerSku('MOB12345');
        $this->assertAttributeEquals('MOB12345', 'sellerSku', $image);
        $this->assertEquals('MOB12345', $image->getSellerSku());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidSellerSkuShouldThrowInvalidArgumentException()
    {
        $image = new ProductImage();
        $image->setSellerSku(1);
    }

    public function testSetGetImages()
    {
        $uri1 = new ImageUri('http://www.host.com/images/logo1.png');
        $uri2 = new ImageUri('http://www.host.com/images/logo2.png');
        $collection = new ImageUriCollection;
        $collection->add($uri1);
        $collection->add($uri2);
        $image = new ProductImage();
        $image->setImages($collection);
        $this->assertAttributeEquals($collection, 'images', $image);
        $this->assertEquals($collection, $image->getImages());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidImagesShouldThrowInvalidArgumentException()
    {
        $image = new ProductImage();
        /** @noinspection PhpParamsInspection */
        $image->setImages(1);
    }
}
