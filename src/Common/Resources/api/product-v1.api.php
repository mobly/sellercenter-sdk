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
            'deserialize' => 'SellerCenter\SDK\Product\Products',
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
            ]
        ],
        'ProductCreate' => [
            'name' => 'ProductCreate',
            'description' => 'This action allows the creation of new products',
            'deserialize' => 'SellerCenter\SDK\Common\Api\SuccessResponse',
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'ProductRequest' => [
                    'type' => 'SellerCenter\SDK\Product\ProductCollection',
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
        'ProductUpdate' => [
            'name' => 'ProductUpdate',
            'description' => 'This action provides a mechanism to update product information',
            'deserialize' => 'SellerCenter\SDK\Common\Api\SuccessResponse',
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'ProductRequest' => [
                    'type' => 'SellerCenter\SDK\Product\ProductCollection',
                    'location' => 'xml',
                    'required' => true,
                ]
            ],
        ],
        'ProductRemove' => [
            'name' => 'ProductRemove',
            'description' => 'This action enables the removal of products',
            'deserialize' => 'SellerCenter\SDK\Common\Api\SuccessResponse',
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'ProductRequest' => [
                    'type' => 'SellerCenter\SDK\Product\ProductCollection',
                    'location' => 'xml',
                    'required' => true,
                ]
            ],
        ],
        'Image' => [
            'name' => 'Image',
            'description' => 'This action provides URLs for the images of products. All existing images
                                will be replaced. The first entry will be used as a default image',
            'deserialize' => 'SellerCenter\SDK\Common\Api\SuccessResponse',
            'http' => [
                'method' => 'POST',
                'requestUri' => '/',
            ],
            'parameters' => [
                'ProductImageRequest' => [
                    'type' => 'SellerCenter\SDK\Product\ProductImageCollection',
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
    ],
];
