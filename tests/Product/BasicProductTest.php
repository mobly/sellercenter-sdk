<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\BasicProduct;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Class BasicProductTest
 *
 * @package SellerCenter\SDK\Entity
 * @author  Daniel Costa
 */
class BasicProductTest extends SdkTestCase
{
    public function testSetGetSellerSku()
    {
        $product = new BasicProduct;
        $product->setSellerSku('SUP12345-ABC');
        $this->assertAttributeEquals('SUP12345-ABC', 'sellerSku', $product);
        $this->assertEquals('SUP12345-ABC', $product->getSellerSku());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidSellerSkuShouldThrowInvalidArgumentException()
    {
        $product = new BasicProduct;
        $product->setSellerSku(1);
    }

    public function testToArray()
    {
        $product = new BasicProduct;
        $product->setSellerSku('MOB123456');

        $expected = [
            'SellerSku' => 'MOB123456',
        ];
        $this->assertEquals($expected, $product->toArray());
    }
}
