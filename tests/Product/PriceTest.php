<?php namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\Price;
use SellerCenter\Test\SDK\SdkTestCase;

class PriceTest extends SdkTestCase
{
    public function testToArray()
    {
        $price = new Price;
        $price->setSellerSku('MOB12345');
        $price->setPrice(159.99);
        $price->setSalePrice(123.99);
        $price->setSaleStartDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2015-01-01 10:00:00'));
        $price->setSaleEndDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2015-01-10 10:00:00'));

        $expected = [
            'SellerSku' => 'MOB12345',
            'Price' => 159.99,
            'SalePrice' => 123.99,
            'SaleStartDate' => '2015-01-01T10:00:00+0000',
            'SaleEndDate' => '2015-01-10T10:00:00+0000',
        ];
        $this->assertEquals($expected, $price->toArray());
    }
}
