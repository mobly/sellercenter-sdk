<?php return [
    'metadata' => [
        'apiVersion' => 'v1',
        'serviceAbbreviation' => 'Product',
        'serviceFullName' => 'Product',
        'signatureVersion' => 'v1',
        'protocol' => 'rest-xml',
    ],
    'operations' => [
        'GetProducts' => [
            'name' => 'GetProducts',
            'description' => 'GetProducts returns a list of all products. The following optional parameters can
                                be used to control which products are returned',
            'deserialize' => SellerCenter\SDK\Product\Api\GetProducts\Response::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
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
                'SkuSellerList' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ]
        ],
        'ProductCreate' => [
            'name' => 'ProductCreate',
            'description' => 'This action allows the creation of new products',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'ProductRequest' => [
                    'type' => SellerCenter\SDK\Product\ProductCollection::class,
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
        'ProductUpdate' => [
            'name' => 'ProductUpdate',
            'description' => 'This action provides a mechanism to update product information',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'ProductRequest' => [
                    'type' => SellerCenter\SDK\Product\ProductCollection::class,
                    'location' => 'xml',
                    'required' => true,
                ]
            ],
        ],
        'ProductRemove' => [
            'name' => 'ProductRemove',
            'description' => 'This action enables the removal of products',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'ProductRequest' => [
                    'type' => SellerCenter\SDK\Product\ProductCollection::class,
                    'location' => 'xml',
                    'required' => true,
                ]
            ],
        ],
        'Image' => [
            'name' => 'Image',
            'description' => 'This action provides URLs for the images of products. All existing images
                                will be replaced. The first entry will be used as a default image',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'ProductImageRequest' => [
                    'type' => SellerCenter\SDK\Product\ProductImageCollection::class,
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
        'GetBrands' => [
            'name' => 'GetBrands',
            'description' => 'Get all or a range of product brands',
            'deserialize' => SellerCenter\SDK\Product\Api\GetBrands\Response::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
            ]
        ],
        'GetCategoryTree' => [
            'name' => 'GetCategoryTree',
            'description' => 'Get the list of all product categories',
            'deserialize' => SellerCenter\SDK\Product\Api\GetCategoryTree\Response::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
            ]
        ],
        'GetCategoryAttributes' => [
            'name' => 'GetCategoryAttributes',
            'description' => 'Returns a list of attributes with options for a given category. It will also display
                            attributes for TaxClass and ShipmentType, with their possible values listed as options.',
            'deserialize' => SellerCenter\SDK\Product\Api\GetCategoryAttributes\AttributeCollection::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'PrimaryCategory' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
        'GetCategoriesByAttributeSet' => [
            'name' => 'GetCategoriesByAttributeSet',
            'description' => 'Returns a list of categories for a given attribute set.',
            'deserialize' => SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet\Response::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'AttributeSet' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
    ],
];
