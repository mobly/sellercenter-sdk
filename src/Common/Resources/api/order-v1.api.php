<?php return [
    'metadata' => [
        'apiVersion' => 'v1',
        'serviceAbbreviation' => 'Order',
        'serviceFullName' => 'Order',
        'signatureVersion' => 'v1',
        'protocol' => 'rest-xml',
    ],
    'operations' => [
        'GetOrders' => [
            'name' => 'GetOrders',
            'description' => 'The GetOrders action returns a list of orderItems created or updated during a time frame',
            'deserialize' => SellerCenter\SDK\Order\Orders::class,
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
                'UpdatedAfter' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'UpdatedBefore' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'Limit' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'Offset' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ]
        ],
        'GetOrder' => [
            'name' => 'GetOrder',
            'description' => 'The GetOrder action returns an order by SellerCenter OrderId',
            'deserialize' => SellerCenter\SDK\Order\Orders::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'OrderId' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
        'GetOrderItems' => [
            'name' => 'GetOrderItems',
            'description' => 'The GetOrderItems action returns order items based on the OrderId',
            'deserialize' => SellerCenter\SDK\Order\OrderItems::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'OrderId' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
        'SetStatusToCanceled' => [
            'name' => 'SetStatusToCanceled',
            'description' => 'Informs SellerCenter that an item with Id OrderItemId has been canceled',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'OrderItemId' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => true,
                ],
                'Reason' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => true,
                ],
                'ReasonDetail' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ]
        ],
        'SetStatusToReadyToShip' => [
            'name' => 'SetStatusToReadyToShip',
            'description' => 'Informs SellerCenter that the item was ready to ship',
            'deserialize' => SellerCenter\SDK\Order\StatusToReadyToShip::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'OrderItemIds' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => true,
                ],
                'DeliveryType' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => true,
                ],
                'ShippingProvider' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'TrackingNumber' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ]
        ],
        'SetStatusToShipped' => [
            'name' => 'SetStatusToShipped',
            'description' => 'Informs SellerCenter that an item with Id OrderItemId has been shipped',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'OrderItemId' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
        'SetStatusToFailedDelivery' => [
            'name' => 'SetStatusToFailedDelivery',
            'description' => 'Informs SellerCenter that an item with Id OrderItemId has been failed',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'OrderItemId' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
        'SetStatusToDelivered' => [
            'name' => 'SetStatusToDelivered',
            'description' => 'Informs SellerCenter that an item with Id OrderItemId has been delivered',
            'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'OrderItemId' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
        'GetFailureReasons' => [
            'name' => 'GetFailureReasons',
            'description' => 'Returns all failed reasons for SetToCancelled or SetToFailedDelivert calls',
            'deserialize' => SellerCenter\SDK\Order\FailureReason::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
            ]
        ],
        'GetShipmentProviders' => [
            'name' => 'GetShipmentProviders',
            'description' => 'Returns all active shipping providers',
            'deserialize' => \SellerCenter\SDK\ShipmentProvider\ShipmentProviderCollection::class,
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
            ]
        ],
    ],
];
