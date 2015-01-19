<?php

namespace SellerCenter\SDK\Test\Product;

use SellerCenter\SDK\Product\ProductImage;
use SellerCenter\SDK\Product\ImageUri;
use SellerCenter\SDK\Product\ImageUriCollection;

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

    public function testToXmlArray()
    {
        $image = new ProductImage();
        $image->setSellerSku('MOB12345');
        $image->getImages()->add(new ImageUri('http://host/img.jpg'));
        $image->getImages()->add(new ImageUri('http://host/img.gif'));
        $image->getImages()->add(new ImageUri('http://host/img.png'));

        $expected = [
            'ProductImage' => [
                'SellerSku' => 'MOB12345',
                'Images' => [
                    [
                        'Image' => 'http://host/img.jpg'
                    ],
                    [
                        'Image' => 'http://host/img.gif'
                    ],
                    [
                        'Image' => 'http://host/img.png'
                    ],
                ]
            ]
        ];
        $this->assertEquals($expected, $image->toXmlArray());
    }
}
