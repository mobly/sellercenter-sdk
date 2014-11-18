<?php
return [
    'version' => 1,
    'endpoints' => [
        'mobly/*' => [
            'endpoint' => 'sellercenter-api.mobly.com.br',
            'signatureVersion' => 'v1'
        ],
        'mobly/staging' => [
            'endpoint' => 'sellercenter-api-staging.mobly.com.br',
            'signatureVersion' => 'v1'
        ]
    ]
];
