<?php namespace SellerCenter\Test\SDK\Product\Api\GetProducts;

use SellerCenter\SDK\Product\Api\GetProducts\Body;
use SellerCenter\SDK\Product\Api\GetProducts\Response;
use SellerCenter\SDK\Product\Product;
use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\Test\SDK\SdkTestCase;

class ResponseTest extends SdkTestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testSetBody()
    {
        $element = new Product;
        $element->setSellerSku('ASM_A8012');

        $collection = new ProductCollection;
        $collection->add($element);

        $body = new Body;
        $body->setProducts($collection);

        $response = new Response;
        $response->setBody($body);

        $this->assertEquals('ASM_A8012', $response->getBody()->getProducts()->first()->getSellerSku());
    }

    public function testeDeserialization()
    {
        $xml = '<SuccessResponse>
  <Head>
    <RequestId><![CDATA[]]></RequestId>
    <RequestAction><![CDATA[GetProducts]]></RequestAction>
    <ResponseType><![CDATA[Products]]></ResponseType>
  </Head>
  <Body>
    <Products>
      <Product>
        <ParentSku><![CDATA[ASM_A8012]]></ParentSku>
        <Status><![CDATA[inactive]]></Status>
        <Name><![CDATA[Product name]]></Name>
        <Variation><![CDATA[...]]></Variation>
        <Quantity><![CDATA[0]]></Quantity>
        <SellerSku><![CDATA[ASM_A8012]]></SellerSku>
        <Price>123.99</Price>
      </Product>
      <Product>
        <ParentSku><![CDATA[DC_10000]]></ParentSku>
        <Status><![CDATA[inactive]]></Status>
        <Name><![CDATA[Produto teste 1 0 0 1 3]]></Name>
        <Variation><![CDATA[...]]></Variation>
        <Quantity><![CDATA[0]]></Quantity>
        <SellerSku><![CDATA[DC_10000]]></SellerSku>
        <Price>123</Price>
      </Product>
    </Products>
  </Body>
</SuccessResponse>';

        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace();

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        /* @var Response $response */
        $response = $serializer->deserialize($xml, 'SellerCenter\SDK\Product\Api\GetProducts\Response', 'xml');

        $this->assertInstanceOf('SellerCenter\SDK\Product\Api\GetProducts\Response', $response);
        $this->assertInstanceOf('SellerCenter\SDK\Common\Api\Response\Success\Head', $response->getHead());
        $this->assertInstanceOf('SellerCenter\SDK\Product\Api\GetProducts\Body', $response->getBody());

        $this->assertEquals('GetProducts', $response->getHead()->getRequestAction());
        $this->assertEquals('Products', $response->getHead()->getResponseType());

        $this->assertCount(2, $response->getBody()->getProducts());

        /* @var \SellerCenter\SDK\Product\Product $product */
        $product = $response->getBody()->getProducts()->first();

        $this->assertInstanceOf('SellerCenter\SDK\Product\Product', $product);
        $this->assertEquals('ASM_A8012', $product->getSellerSku());
    }
}
