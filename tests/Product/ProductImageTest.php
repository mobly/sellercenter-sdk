<?php namespace SellerCenter\Test\SDK\Product;

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
        $element = new ImageUri('http://host.com/img1.jpg');

        $collection = new ImageUriCollection;
        $collection->add($element);

        $image = new ProductImage('MOB12345', $collection);

        $this->assertEquals(1, $image->count());
    }

    public function testToArrayWithImageUriAddedOnConstructor()
    {
        $element = new ImageUri('http://host.com/img1.jpg');

        $collection = new ImageUriCollection;
        $collection->add($element);

        $image = new ProductImage('MOB12345', $collection);

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

    public function testGetElements()
    {
        $collection = new ProductImage('ASM_A8012');
        $collection->add(new ImageUri('http://host.com/img1.jpg'));
        $collection->add(new ImageUri('http://host.com/img2.jpg'));

        $this->assertEquals(2, count($collection->getElements()));
    }

    public function testSerialization()
    {
        $collection = new ProductImage('MOB_12345');
        $collection->add(new ImageUri('http://host.com/img1.jpg'));
        $collection->add(new ImageUri('http://host.com/img2.jpg'));

        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        $xml = '
            <ProductImage>
                <SellerSku>MOB_12345</SellerSku>
                <Images>
                    <Image>http://host.com/img1.jpg</Image>
                    <Image>http://host.com/img2.jpg</Image>
                </Images>
            </ProductImage>
        ';

        $this->assertXmlStringEqualsXmlString($xml, $serializer->serialize($collection, 'xml'));
    }
}
