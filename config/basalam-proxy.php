<?php

return [

    'sdk_adapter' => \Unisa\BasalamProxy\Adapters\DefaultSdkAdapter::class,
    'vendor_id' => env('BASALAM_VENDOR_ID'),
    'access_token' => env('BASALAM_ACCESS_TOKEN'),
    'services' => [
        'core' => [
            'base_url' => env('BASALAM_CORE_SERVICE_URL', 'https://core.basalam.com'),
        ],
        'categorydetection' => [
            'base_url' => env('BASALAM_CATEGORY_DETECTION_SERVICE_URL', 'https://categorydetection.basalam.com'),
        ],
        'uploadio' => [
            'base_url' => env('BASALAM_UPLOADIO_SERVICE_URL', 'https://uploadio.basalam.com'),
        ]
    ],

    'request_validation' => true,
    'response_validation' => true,

    'logger_channel' => env('PROXY_LOGGER_CHANNEL', null),
];
