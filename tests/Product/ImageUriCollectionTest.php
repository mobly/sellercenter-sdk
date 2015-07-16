<?php namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\ImageUri;
use SellerCenter\SDK\Product\ImageUriCollection;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * ImageUriCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class ImageUriCollectionTest extends SdkTestCase
{
    public function testConstructorWithEmptyArray()
    {
        $collection = new ImageUriCollection;
        $collection->add(new ImageUri('http://host.com/img.jpg'));

        $this->assertEquals(1, $collection->count());
    }

    public function testConstructorWithArrayData()
    {
        $collection = new ImageUriCollection([new ImageUri('http://host.com/img1.jpg')]);
        $collection->add(new ImageUri('http://host.com/img2.jpg'));

        $this->assertEquals(2, $collection->count());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element is not an instance of ImageUri
     */
    public function testAddInvalidImageShouldThrowInvalidArgumentException()
    {
        $collection = new ImageUriCollection;
        $collection->add(1);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Method set is not allowed
     */
    public function testSetShouldThrowInvalidArgumentException()
    {
        $collection = new ImageUriCollection;
        $collection->set('key', 'value');
    }

    public function testToArray()
    {
        $collection = new ImageUriCollection;
        $collection->add(new ImageUri('http://host.com/img.jpg'));

        $expected = ['http://host.com/img.jpg'];
        $this->assertEquals($expected, $collection->toArray());
    }

    public function testGetElements()
    {
        $collection = new ImageUriCollection;
        $collection->add(new ImageUri('http://host.com/img.jpg'));

        $this->assertEquals(1, count($collection->getElements()));
    }

    public function testSerialization()
    {
        $collection = new ImageUriCollection;
        $collection->add(new ImageUri('http://host.com/img1.jpg'));
        $collection->add(new ImageUri('http://host.com/img2.jpg'));

        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        $xml = '
            <Images>
                <Image>http://host.com/img1.jpg</Image>
                <Image>http://host.com/img2.jpg</Image>
            </Images>
        ';

        $this->assertXmlStringEqualsXmlString($xml, $serializer->serialize($collection, 'xml'));
    }
}
