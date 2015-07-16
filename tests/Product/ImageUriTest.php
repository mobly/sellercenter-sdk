<?php namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\ImageUri;
use SellerCenter\Test\SDK\SdkTestCase;

class ImageUriTest extends SdkTestCase
{
    public function testConstructorShouldSetUrl()
    {
        $imageUri = new ImageUri('http://www.mobly.com.br/img/product-1.jpg');
        $this->assertEquals('http://www.mobly.com.br/img/product-1.jpg', (string) $imageUri);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid image URL: img/product-1.jpg
     */
    public function testInvalidUriShoudThrowInvalidArgumentException()
    {
        new ImageUri('img/product-1.jpg');
    }

    public function testSerialization()
    {
        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        $xml = '<Image>http://www.mobly.com.br/img/product-1.jpg</Image>';
        $imageUri = new ImageUri('http://www.mobly.com.br/img/product-1.jpg');

        $this->assertXmlStringEqualsXmlString($xml, $serializer->serialize($imageUri, 'xml'));
    }
}
