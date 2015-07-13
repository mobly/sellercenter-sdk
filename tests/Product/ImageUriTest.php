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

    public function testImageUriSerialized()
    {
        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            getcwd() . '/vendor/jms/serializer/src'
        );

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        $this->assertXmlStringEqualsXmlString(
            '<Image>http://www.mobly.com.br/img/product-1.jpg</Image>',
            $serializer->serialize(new ImageUri('http://www.mobly.com.br/img/product-1.jpg'), 'xml')
        );
    }
}
