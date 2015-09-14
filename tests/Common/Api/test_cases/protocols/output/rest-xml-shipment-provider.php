<?php

return [
    [
        'description' => 'ShipmentProvider',
        'metadata' => [
            'protocol' => 'rest-xml'
        ],
        'cases' => [
            [
                'given' => [
                    'name' => 'GetShipmentProviders',
                    'deserialize' => SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders\Response::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/GetShipmentProviders.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetShipmentProviders',
                        'ResponseType' => 'ShipmentProvider',
                        'Timestamp' => '2013-08-27T14:44:13+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/GetShipmentProviders.serialized')
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
