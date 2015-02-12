<?php
return [
    'version' => 1,
    'endpoints' => [
        'mobly/production' => [
            'endpoint' => 'sellercenter-api.mobly.com.br',
            'signatureVersion' => 'v1'
        ],
        'mobly/*' => [
            'endpoint' => 'sellercenter-api-staging.mobly.com.br',
            'signatureVersion' => 'v1'
        ]
    ]
];
