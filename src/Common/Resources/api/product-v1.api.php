<?php return [
    'metadata' => [
        'apiVersion' => 'v1',
        'serviceAbbreviation' => 'Product',
        'serviceFullName' => 'Product',
        'signatureVersion' => 'v1',
        'protocol' => 'rest-xml',
    ],
    'operations' => [
        'ProductAdd' => [
            'name' => 'ProductAdd',
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
        'Price' => [
            'name' => 'Price',
            'http' => [
                'method' => 'POST',
                'requestUri' => '/',
            ],
        ],
    ],
];
