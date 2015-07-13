<?php namespace SellerCenter\Test\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use SellerCenter\SDK\Common\Api\SuccessResponse\Head;
use SellerCenter\SDK\Product\Products\Body;
use SellerCenter\Test\SDK\SdkTestCase;

class ProductsTest extends SdkTestCase
{
    public function testDeserialization()
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
        <ParentSku><![CDATA[19388]]></ParentSku>
        <Status><![CDATA[active]]></Status>
        <Name><![CDATA[Centrífuga Cadence Juicer Plus JCR400 Cinza/Preta - 700 W + Grill Cadence Saudável Sabor Família GRL295]]></Name>
        <Variation><![CDATA[Parent]]></Variation>
        <Quantity><![CDATA[0]]></Quantity>
        <SellerSku><![CDATA[19388]]></SellerSku>
        <Price>289.9</Price>
      </Product>
    </Products>
  </Body>
</SuccessResponse>';

        \SellerCenter\SDK\Common\AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            getcwd() . '/vendor/jms/serializer/src'
        );

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        /* @var \SellerCenter\SDK\Product\Products $products */
        $products = $serializer->deserialize($xml, 'SellerCenter\SDK\Product\Products', 'xml');

        $this->assertInstanceOf('SellerCenter\SDK\Common\Api\SuccessResponse\Head', $products->getHead());
        $this->assertInstanceOf('SellerCenter\SDK\Product\Products\Body', $products->getBody());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $products->getBody()->getProducts());
        $this->assertInstanceOf('SellerCenter\SDK\Product\Product', $products->getBody()->getProducts()->first());

        $newArrayCollection = new ArrayCollection([$products->getBody()->getProducts()->first()]);
        $products->getBody()->setProducts($newArrayCollection);

        $newBody = new Body();
        $products->setBody($newBody);

        $newHead = new Head();
        $products->setHead($newHead);

//        $this->assertEquals('GetProducts', $products->getHead()->getRequestAction());
//        $this->assertEquals('Products', $products->getHead()->getResponseType());
    }
}
