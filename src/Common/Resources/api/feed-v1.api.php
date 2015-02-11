<?php return [
    'metadata' => [
        'apiVersion' => 'v1',
        'serviceAbbreviation' => 'Feed',
        'serviceFullName' => 'Feed',
        'signatureVersion' => 'v1',
        'protocol' => 'rest-xml',
    ],
    'operations' => [
        'FeedList' => [
            'name' => 'FeedList',
            'description' => 'The FeedList returns a SuccessResponse with a list of all feeds created in the
                                past 30 days in the Body section. The ResponseType is Feed',
            'deserialize' => 'SellerCenter\SDK\Feed\FeedList',
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
            ]
        ],
        'FeedOffsetList' => [
            'name' => 'FeedOffsetList',
            'description' => 'This action is similar to FeedList, but accepts extra paging/filtering parameters
                                on the request URL. The ResponseType is Feed (see examples for FeedList)',
            'deserialize' => 'SellerCenter\SDK\Feed\FeedList',
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'Offset' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => false,
                ],
                'PageSize' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => false,
                ],
                'Status' => [
                    'type' => 'int',
                    'location' => 'query',
                    'required' => false,
                ],
            ]
        ],
        'FeedCount' => [
            'name' => 'FeedCount',
            'description' => 'The FeedCount action returns a list of counters of the feeds for the current Seller.
                                Only the last 30 days are considered. The ResponseType is FeedCount',
            'deserialize' => 'SellerCenter\SDK\Feed\FeedCount',
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
            ]
        ],
        'FeedCancel' => [
            'name' => 'FeedCancel',
            'description' => 'This action allows the cancellation of submitted feeds with „Queued“ status.
                                This Action has no ResponseType',
            'deserialize' => 'SellerCenter\SDK\Common\Api\SuccessResponse',
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'FeedID' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
        'FeedStatus' => [
            'name' => 'FeedStatus',
            'description' => '',
            'deserialize' => 'SellerCenter\SDK\Feed\FeedStatus',
            'http' => [
                'method' => 'GET',
                'requestUri' => '/',
            ],
            'parameters' => [
                'FeedID' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => true,
                ],
            ]
        ],
    ],
];
