<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\ImageUri;
use SellerCenter\SDK\Product\ProductImageCollection;
use SellerCenter\SDK\Product\ProductImage;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * ImageCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ProductImageCollectionTest extends SdkTestCase
{
    public function testAddImageToCollection()
    {
        $image = new ProductImage;
        $image->setSellerSku('12345');
        $collection = new ProductImageCollection;
        $collection->add($image);
        $this->assertEquals($collection->count(), 1);
    }

    public function testToArray()
    {
        $collection = new ProductImageCollection;

        $image1 = new ProductImage();
        $image1->setSellerSku('MOB12345');
        $image1->getImages()->add(new ImageUri('http://host/img.jpg'));
        $image1->getImages()->add(new ImageUri('http://host/img.gif'));
        $image1->getImages()->add(new ImageUri('http://host/img.png'));
        $collection->add($image1);

        $image2 = new ProductImage();
        $image2->setSellerSku('MOB987654');
        $image2->getImages()->add(new ImageUri('http://host/img2.jpg'));
        $image2->getImages()->add(new ImageUri('http://host/img2.gif'));
        $image2->getImages()->add(new ImageUri('http://host/img2.png'));
        $collection->add($image2);

        $expected = [
            $image1->toArray(),
            $image2->toArray(),
        ];
        $this->assertEquals($expected, $collection->toArray());
    }
}
