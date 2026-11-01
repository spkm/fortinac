<?php

return [
    // The address of your FortiNAC server, with the port its REST API listens on: https://nac.example.com:8443
    'base_url' => env('FORTINAC_BASE_URL'),

    // The token of an admin user with API access (System > Admin Users; its Admin Profile decides what it may do)
    'token' => env('FORTINAC_TOKEN'),

    // Whether to verify the server's TLS certificate: false for a self-signed one, or the path of a CA bundle
    'verify' => env('FORTINAC_VERIFY', true),

    // Other servers, used with FortiNac::connection('name'):
    // 'connections' => [
    //     'other' => [
    //         'base_url' => env('FORTINAC_OTHER_BASE_URL'),
    //         'token' => env('FORTINAC_OTHER_TOKEN'),
    //         'verify' => env('FORTINAC_OTHER_VERIFY', true),
    //     ],
    // ],
    'connections' => [],

    'timeouts' => [
        'connect' => env('FORTINAC_CONNECT_TIMEOUT', 10),
        'request' => env('FORTINAC_REQUEST_TIMEOUT', 30),
    ],

    'retries' => [
        'times' => env('FORTINAC_RETRIES'),
        'interval_ms' => 500,
    ],

    'cache' => [
        'enabled' => env('FORTINAC_CACHE', false),
        'store' => env('FORTINAC_CACHE_STORE'),
        'seconds' => 3600,
    ],

    'pagination' => [
        'per_page' => 100,
    ],
];
