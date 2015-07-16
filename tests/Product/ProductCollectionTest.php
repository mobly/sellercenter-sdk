<?php namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\SDK\Product\Product;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * ProductCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ProductCollectionTest extends SdkTestCase
{
    public function testConstructorWithEmptyArray()
    {
        $collection = new ProductCollection;
        $collection->add(new Product);

        $this->assertEquals(1, $collection->count());
    }

    public function testConstructorWithArrayData()
    {
        $collection = new ProductCollection([new Product]);
        $collection->add(new Product);

        $this->assertEquals(2, $collection->count());
    }

    public function testAdd()
    {
        $collection = new ProductCollection();
        $collection->add(new Product());
        $this->assertEquals(1, $collection->count());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element is not an instance of Product
     */
    public function testAddInvalidElementShouldThrowInvalidArgumentException()
    {
        $collection = new ProductCollection();
        $collection->add(1);
    }

    public function testToArray()
    {
        $collection = new ProductCollection();
        $product = new Product();
        $product->setSellerSku('123ABCMOB');
        $collection->add($product);
        $expected = [
            [
                'SellerSku' => '123ABCMOB'
            ]
        ];
        $this->assertEquals($expected, $collection->toArray());
    }

    public function testGetElements()
    {
        $collection = new ProductCollection;
        $collection->add(new Product);
        $collection->add(new Product);

        $this->assertEquals(2, count($collection->getElements()));
    }

    public function testSerialization()
    {
        $element1 = new Product;
        $element1->setSellerSku('MOB_12543');

        $element2 = new Product;
        $element2->setSellerSku('ASM_A8012');

        $collection = new ProductCollection;
        $collection->add($element1);
        $collection->add($element2);

        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        $xml = '
            <Request>
                <Product>
                    <SellerSku>MOB_12543</SellerSku>
                </Product>
                <Product>
                    <SellerSku>ASM_A8012</SellerSku>
                </Product>
            </Request>
        ';

        $this->assertXmlStringEqualsXmlString($xml, $serializer->serialize($collection, 'xml'));
    }
}
