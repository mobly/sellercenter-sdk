<?php

namespace SellerCenter\SDK\Test\Product;

use SellerCenter\SDK\Product\Price;

class PriceTest extends \PHPUnit_Framework_TestCase
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
            'SaleFromDate' => '2015-01-01T10:00:00+0000',
            'SaleToDate' => '2015-01-10T10:00:00+0000',
        ];
        $this->assertEquals($expected, $price->toArray());
    }

    public function testToXmlArray()
    {
        $price = new Price;
        $price->setSellerSku('MOB12345');
        $price->setPrice(159.99);
        $price->setSalePrice(123.99);
        $price->setSaleStartDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2015-01-01 10:00:00'));
        $price->setSaleEndDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2015-01-10 10:00:00'));

        $expected = [
            'Price' => [
                'SellerSku' => 'MOB12345',
                'Price' => 159.99,
                'SalePrice' => 123.99,
                'SaleFromDate' => '2015-01-01T10:00:00+0000',
                'SaleToDate' => '2015-01-10T10:00:00+0000',
            ]
        ];
        $this->assertEquals($expected, $price->toXmlArray());
    }
}
