<?php

$product = new \SellerCenter\SDK\Product\Product;
$product->setSellerSku('MOB-12345');
$product->setName('Product');
$productCollection = new \SellerCenter\SDK\Product\ProductCollection;
$productCollection->add($product);

$productCollectionXml = '
<Request>
    <Product>
        <Name>Product</Name>
        <SellerSku>MOB-12345</SellerSku>
    </Product>
</Request>
';

return [
    [
        'description' => 'Product',
        'metadata' => [
            'protocol' => 'rest-xml',
            'apiVersion' => 'v1'
        ],
        'cases' => [
            [
                'given' => [
                    'http' => [
                        'method' => 'GET',
                        'requestUri' => '/',
                    ],
                    'name' => 'GetProducts',
                    'parameters' => [
                        'CreatedAfter' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false,
                        ],
                        'CreatedBefore' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false,
                        ],
                        'Search' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false,
                        ],
                        'Filter' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false,
                        ],
                        'Limit' => [
                            'type' => 'int',
                            'location' => 'query',
                            'required' => false,
                        ],
                        'Offset' => [
                            'type' => 'int',
                            'location' => 'query',
                            'required' => false,
                        ],
                    ]
                ],
                'params' => [
                    'Search' => 'ASM_A8012',
                ],
                'serialized' => [
                    'method' => 'GET',
                    'body' => '',
                    'uri' => '/?Search=ASM_A8012',
                    'headers' => []
                ],
            ],
            [
                'given' => [
                    'http' => [
                        'method' => 'POST',
                        'requestUri' => '/',
                    ],
                    'name' => 'ProductCreate',
                    'parameters' => [
                        'ProductRequest' => [
                            'type' => 'SellerCenter\SDK\Product\ProductCollection',
                            'location' => 'xml',
                            'required' => true,
                        ],
                    ]
                ],
                'params' => [
                    'ProductRequest' => $productCollection,
                ],
                'serialized' => [
                    'method' => 'POST',
                    'body' => $productCollectionXml,
                    'uri' => '/',
                    'headers' => [
                        'Content-type' => 'application/xml'
                    ]
                ],
            ],
            [
                'given' => [
                    'http' => [
                        'method' => 'POST',
                        'requestUri' => '/',
                    ],
                    'name' => 'ProductUpdate',
                    'parameters' => [
                        'ProductRequest' => [
                            'type' => 'SellerCenter\SDK\Product\ProductCollection',
                            'location' => 'xml',
                            'required' => true,
                        ],
                    ]
                ],
                'params' => [
                    'ProductRequest' => $productCollection,
                ],
                'serialized' => [
                    'method' => 'POST',
                    'body' => $productCollectionXml,
                    'uri' => '/',
                    'headers' => [
                        'Content-type' => 'application/xml'
                    ]
                ],
            ],
        ],
    ],
];
