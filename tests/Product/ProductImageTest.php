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
    public function testConstructorSetsSellerSku()
    {
        $image = new ProductImage('MOB12345');
        $this->assertAttributeEquals('MOB12345', 'sellerSku', $image);
        $this->assertEquals('MOB12345', $image->getSellerSku());
    }

    public function testGetImages()
    {
        $imageUriCollection = new ImageUriCollection;
        $imageUri = new ImageUri('http://host.com/img1.jpg');
        $imageUriCollection->add($imageUri);
        $image = new ProductImage('MOB12345', $imageUriCollection);

        $this->assertEquals(1, $image->getImages()->count());
    }

    public function testToArrayWithImageUriAddedOnConstructor()
    {
        $imageUriCollection = new ImageUriCollection;
        $imageUri = new ImageUri('http://host.com/img1.jpg');
        $imageUriCollection->add($imageUri);
        $image = new ProductImage('MOB12345', $imageUriCollection);

        $expected = [
            'SellerSku' => 'MOB12345',
            'Images' => [
                'http://host.com/img1.jpg',
            ]
        ];

        $this->assertEquals($expected, $image->toArray());
    }

    public function testToArrayWithImageUriAddedLater()
    {
        $image = new ProductImage('MOB12345');
        $image->add(new ImageUri('http://host/img.jpg'));
        $image->add(new ImageUri('http://host/img.gif'));
        $image->add(new ImageUri('http://host/img.png'));

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
