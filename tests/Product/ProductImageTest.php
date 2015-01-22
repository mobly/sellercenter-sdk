<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\ProductImage;
use SellerCenter\SDK\Product\ImageUri;
use SellerCenter\SDK\Product\ImageUriCollection;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Image Test
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ProductImageTest extends SdkTestCase
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

    public function testToArray()
    {
        $image = new ProductImage();
        $image->setSellerSku('MOB12345');
        $image->getImages()->add(new ImageUri('http://host/img.jpg'));
        $image->getImages()->add(new ImageUri('http://host/img.gif'));
        $image->getImages()->add(new ImageUri('http://host/img.png'));

        $expected = [
            'SellerSku' => 'MOB12345',
            'Images' => [
                'http://host/img.jpg',
                'http://host/img.gif',
                'http://host/img.png',
            ]
        ];
        $this->assertEquals($expected, $image->toArray());
    }
}
