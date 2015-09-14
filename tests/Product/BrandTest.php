<?php namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\Api\GetBrands\Body;
use SellerCenter\SDK\Product\Api\GetBrands\Response;
use SellerCenter\SDK\Product\Brand;
use SellerCenter\SDK\Product\BrandCollection;

class BrandTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValue()
    {
        $brand = new Brand;
        $brand
            ->setGlobalIdentifier('BRAND')
            ->setName('Brand');
        $this->assertAttributeEquals('BRAND', 'globalIdentifier', $brand);
        $this->assertAttributeEquals('Brand', 'name', $brand);
        $this->assertEquals('BRAND', $brand->getGlobalIdentifier());
        $this->assertEquals('Brand', $brand->getName());
    }

    public function testGetBrandsResponse()
    {
        $collection = new BrandCollection;

        $brand = new Brand;
        $brand
            ->setGlobalIdentifier('SONY')
            ->setName('Sony');
        $collection->add($brand);

        $body = new Body;
        $body->setBrands($collection);

        $response = new Response;
        $response->setBody($body);

        $this->assertEquals($brand, $response->getBody()->getBrands()->first());
        $this->assertEquals(
            [
                'SONY' => [
                    'globalIdentifier' => 'SONY',
                    'name' => 'Sony',
                ],
            ],
            $response->getBody()->toArray()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Value is not an instance of Brand
     */
    public function testAddInvalidBrandShouldThrowInvalidArgumentException()
    {
        $collection = new BrandCollection;
        $collection->add(1);
    }
}
