<?php

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
                    'deserialize' => SellerCenter\SDK\Product\Api\GetProducts\Response::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/GetProducts.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetProducts',
                        'ResponseType' => 'Products',
                        'Timestamp' => '2015-07-01T11:11:11+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(file_get_contents(__DIR__ . '/fixtures/GetProducts.serialized')),
                    'headers' => [
                        'X-Foo' => 'baz'
                    ],
                    'body' => [
                        'Foo' => 'abc'
                    ],
                ],
            ],
            [
                'given' => [
                    'name' => 'GetBrands',
                    'deserialize' => SellerCenter\SDK\Product\Api\GetBrands\Response::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/GetBrands.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetBrands',
                        'ResponseType' => 'Brands',
                        'Timestamp' => '2015-07-01T11:11:11+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(file_get_contents(__DIR__ . '/fixtures/GetBrands.serialized')),
                    'headers' => [
                        'X-Foo' => 'baz'
                    ],
                    'body' => [
                        'Foo' => 'abc'
                    ],
                ],
            ],
            [
                'given' => [
                    'name' => 'GetCategoryTree',
                    'deserialize' => \SellerCenter\SDK\Product\Api\GetCategoryTree\Response::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/GetCategoryTree.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetCategoryTree',
                        'ResponseType' => 'Categories',
                        'Timestamp' => '2015-07-01T11:11:11+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/GetCategoryTree.serialized')
                    ),
                    'headers' => [
                        'X-Foo' => 'baz'
                    ],
                    'body' => [
                        'Foo' => 'abc'
                    ],
                ],
            ],
            [
                'given' => [
                    'name' => 'GetCategoryAttributes',
                    'deserialize' => \SellerCenter\SDK\Product\Api\GetCategoryAttributes\AttributeCollection::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/GetCategoryAttributes.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetCategoryAttributes',
                        'ResponseType' => 'Attributes',
                        'Timestamp' => '2015-07-01T11:11:11+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/GetCategoryAttributes.serialized')
                    ),
                    'headers' => [
                        'X-Foo' => 'baz'
                    ],
                    'body' => [
                        'Foo' => 'abc'
                    ],
                ],
            ],
            [
                'given' => [
                    'name' => 'GetCategoriesByAttributeSet',
                    'deserialize' => \SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet\Response::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/GetCategoriesByAttributeSet.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetCategoriesByAttributeSet',
                        'ResponseType' => 'AttributeSets',
                        'Timestamp' => '2015-07-16T05:19:15+0200',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/GetCategoriesByAttributeSet.serialized')
                    ),
                    'headers' => [
                        'X-Foo' => 'baz'
                    ],
                    'body' => [
                        'Foo' => 'abc'
                    ],
                ],
            ],
        ],
    ],
];
