<?php return [
    'metadata' => [
        'apiVersion' => 'v1',
        'serviceAbbreviation' => 'Product',
        'serviceFullName' => 'Product',
        'signatureVersion' => 'v1',
        'protocol' => 'rest-xml',
    ],
    'operations' => [
        'Inventory' => [
            'name' => 'Inventory',
            'description' => 'Performs inventory (stock) updates',
            'http' => [
                'method' => 'POST',
                'requestUri' => '/',
            ],
            'parameters' => [
                'Request' => [
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
        'Price' => [
            'name' => 'Price',
            'description' => 'Performs price updates, including rebates',
            'http' => [
                'method' => 'POST',
                'requestUri' => '/',
            ],
            'parameters' => [
                'Request' => [
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
        'ProductAdd' => [
            'name' => 'ProductAdd',
            'description' => 'Performs product insertions',
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'Request' => [
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
        'ProductUpdate' => [
            'name' => 'ProductUpdate',
            'description' => 'Performs product updates',
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'Request' => [
                    'location' => 'xml',
                    'required' => true,
                ]
            ],
        ],
        'ProductRemove' => [
            'name' => 'ProductUpdate',
            'description' => 'Performs product removals',
            'http' => [
                'method' => 'POST',
            ],
            'parameters' => [
                'Request' => [
                    'location' => 'xml',
                    'required' => true,
                ]
            ],
        ],
        'Image' => [
            'name' => 'Image',
            'description' => 'Performs upload of product images',
            'http' => [
                'method' => 'POST',
                'requestUri' => '/',
            ],
            'parameters' => [
                'Request' => [
                    'location' => 'xml',
                    'required' => true,
                ]
            ]
        ],
    ],
];
