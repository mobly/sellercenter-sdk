<?php

namespace SellerCenter\SDK\Product;

use Zend\Uri\Uri;

/**
 * Image Test
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ImageTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetSellerSku()
    {
        $image = new Image();
        $image->setSellerSku('MOB12345');
        $this->assertAttributeEquals('MOB12345', 'sellerSku', $image);
        $this->assertEquals('MOB12345', $image->getSellerSku());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidSellerSkuShouldThrowInvalidArgumentException()
    {
        $image = new Image();
        $image->setSellerSku(1);
    }

    public function testSetGetImage()
    {
        $uri = new Uri('http://www.host.com/images/logo.png');
        $image = new Image();
        $image->setImage($uri);
        $this->assertInstanceOf('Zend\Uri\Uri', $image->getImage());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidImageShouldThrowInvalidArgumentException()
    {
        $image = new Image();
        /** @noinspection PhpParamsInspection */
        $image->setImage(1);
    }

    public function testSetGetImages()
    {
        $uri1 = new Uri('http://www.host.com/images/logo1.png');
        $uri2 = new Uri('http://www.host.com/images/logo2.png');
        $collection = new ImageUriCollection;
        $collection->add($uri1);
        $collection->add($uri2);
        $image = new Image();
        $image->setImages($collection);
        $this->assertAttributeEquals($collection, 'images', $image);
        $this->assertEquals($collection, $image->getImages());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidImagesShouldThrowInvalidArgumentException()
    {
        $image = new Image();
        /** @noinspection PhpParamsInspection */
        $image->setImages(1);
    }
}
