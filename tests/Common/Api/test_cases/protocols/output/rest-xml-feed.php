<?php

return [
    [
        'description' => 'Feed',
        'metadata' => [
            'protocol' => 'rest-xml'
        ],
        'cases' => [
            [
                'given' => [
                    'name' => 'FeedList',
                    'deserialize' => SellerCenter\SDK\Feed\FeedList::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/FeedList.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'FeedList',
                        'ResponseType' => 'Feed',
                        'Timestamp' => '2013-10-28T16:33:55+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/FeedList.serialized')
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
                    'name' => 'FeedOffsetList',
                    'deserialize' => SellerCenter\SDK\Feed\FeedList::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/FeedOffsetList.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'FeedList',
                        'ResponseType' => 'Feed',
                        'Timestamp' => '2013-10-28T16:33:55+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/FeedOffsetList.serialized')
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
                    'name' => 'FeedCount',
                    'deserialize' => SellerCenter\SDK\Feed\FeedCount::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/FeedCount.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'FeedCount',
                        'ResponseType' => 'FeedCount',
                        'Timestamp' => '2015-07-01T11:11:11+0000',
                        'RequestParameters' => [],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/FeedCount.serialized')
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
                    'name' => 'FeedCancel',
                    'deserialize' => SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/FeedCancel.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'FeedCancel',
                        'ResponseType' => '',
                        'Timestamp' => '2015-07-01T11:11:11+0000',
                        'RequestParameters' => [
                            'FeedID' => 'c685b76e-180d-484c-b0ef-7e9aee9e3f98',
                        ],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/FeedCancel.serialized')
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
                    'name' => 'GetFeedRawInput',
                    'deserialize' => SellerCenter\SDK\Feed\Api\GetFeedRawInput\Response::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/GetFeedRawInput.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'GetFeedRawInput',
                        'ResponseType' => 'FeedRawInput',
                        'Timestamp' => '2015-06-25T07:55:38+0000',
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/GetFeedRawInput.serialized')
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
                    'name' => 'FeedStatus',
                    'deserialize' => SellerCenter\SDK\Feed\FeedStatus::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/FeedStatus.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'FeedStatus',
                        'ResponseType' => 'FeedDetail',
                        'Timestamp' => '2015-07-06T15:00:14+0200',
                        'RequestParameters' => [
                            'FeedID' => '883bdfe3-950f-4390-9a80-41437b69808c',
                        ],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/FeedStatus.serialized')
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
                    'name' => 'FeedStatusWithErrors',
                    'deserialize' => SellerCenter\SDK\Feed\FeedStatus::class,
                ],
                'response' => [
                    'status_code' => 200,
                    'headers' => [
                        'X-SellerCenter-Machine' => 'web01'
                    ],
                    'body' => file_get_contents(__DIR__ . '/fixtures/FeedStatusWithErrors.xml'),
                ],
                'result' => [
                    'Head' => [
                        'RequestId' => '',
                        'RequestAction' => 'FeedStatus',
                        'ResponseType' => 'FeedDetail',
                        'Timestamp' => '2015-07-06T15:00:14+0200',
                        'RequestParameters' => [
                            'FeedID' => '883bdfe3-950f-4390-9a80-41437b69808c',
                        ],
                    ],
                    'Body' => unserialize(
                        file_get_contents(__DIR__ . '/fixtures/FeedStatusWithErrors.serialized')
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
