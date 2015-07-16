<?php

$product = new \SellerCenter\SDK\Product\Product;
$product->setSellerSku('ASM_A8012');
$product->setStatus(\SellerCenter\SDK\Product\Enum\StatusEnum::INACTIVE());
$productCollection = new \SellerCenter\SDK\Product\ProductCollection;
$productCollection->add($product);
$productBody = new \SellerCenter\SDK\Product\Api\GetProducts\Body;
$productBody->setProducts($productCollection);

$xmlGetProducts = '<SuccessResponse>
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

return [
    [
        'description' => 'Product',
        'metadata' => [
            'protocol' => 'rest-xml'
        ],
        'cases' => [
             [
                'given' => [
                    'name' => 'GetProducts',
                    'deserialize' => 'SellerCenter\SDK\Product\Api\GetProducts\Response',
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => $xmlGetProducts
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetProducts',
                        'ResponseType' => 'Products',
                        'RequestParameters' => [],
                    ],
                    'Body' => $productBody,
                    'headers' => [
                        'X-Foo' => 'baz'
                    ],
                    'body' => [
                        'Foo' => 'abc'
                    ]
                ]
            ]
        ]
    ]
];
