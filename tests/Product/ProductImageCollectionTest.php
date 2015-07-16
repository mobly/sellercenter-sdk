<?php namespace SellerCenter\Test\SDK\Product;

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
    public function testConstructorWithEmptyArray()
    {
        $collection = new ProductImageCollection;
        $collection->add(new ProductImage('ASM_A8012'));

        $this->assertEquals(1, $collection->count());
    }

    public function testConstructorWithArrayData()
    {
        $collection = new ProductImageCollection([new ProductImage('ASM_A8012')]);
        $collection->add(new ProductImage('ASM_A8013'));

        $this->assertEquals(2, $collection->count());
    }

    public function testAddImageToCollection()
    {
        $element = new ProductImage('12345');

        $collection = new ProductImageCollection();
        $collection->add($element);

        $this->assertEquals(1, $collection->count());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element is not an instance of ProductImage
     */
    public function testAddInvalidImageShouldThrowInvalidArgumentException()
    {
        $collection = new ProductImageCollection();
        $collection->add(1);
    }

    public function testToArray()
    {
        $element1 = new ProductImage('MOB12345');
        $element1->add(new ImageUri('http://host/img.jpg'));
        $element1->add(new ImageUri('http://host/img.gif'));
        $element1->add(new ImageUri('http://host/img.png'));

        $element2 = new ProductImage('MOB987654');
        $element2->add(new ImageUri('http://host/img2.jpg'));
        $element2->add(new ImageUri('http://host/img2.gif'));
        $element2->add(new ImageUri('http://host/img2.png'));

        $collection = new ProductImageCollection;
        $collection->add($element1);
        $collection->add($element2);

        $expected = [
            $element1->toArray(),
            $element2->toArray(),
        ];

        $this->assertEquals($expected, $collection->toArray());
    }

    public function testGetElements()
    {
        $collection = new ProductImageCollection;
        $collection->add(new ProductImage('MOB12345'));
        $collection->add(new ProductImage('MOB987654'));

        $this->assertEquals(2, count($collection->getElements()));
    }

    public function testSerialization()
    {
        $element1 = new ProductImage('MOB_12543');
        $element1->add(new ImageUri('http://host.com/img1.jpg'));
        $element2 = new ProductImage('ASM_A8012');
        $element2->add(new ImageUri('http://host.com/img2.jpg'));

        $collection = new ProductImageCollection;
        $collection->add($element1);
        $collection->add($element2);

        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        $xml = '
            <Request>
                <ProductImage>
                    <SellerSku>MOB_12543</SellerSku>
                    <Images>
                        <Image>http://host.com/img1.jpg</Image>
                    </Images>
                </ProductImage>
                <ProductImage>
                    <SellerSku>ASM_A8012</SellerSku>
                    <Images>
                        <Image>http://host.com/img2.jpg</Image>
                    </Images>
                </ProductImage>
            </Request>
        ';

        $this->assertXmlStringEqualsXmlString($xml, $serializer->serialize($collection, 'xml'));
    }
}
