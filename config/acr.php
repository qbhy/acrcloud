<?php

return [
    'debug'              => env('ACR_DEBUG', true),
    // console API
    'console_host'       => env('ACR_CONSOLE_HOST', 'https://cn-api.acrcloud.com'),
    'console_access_key' => env('ACR_CONSOLE_ACCESS_KEY'),
    'console_secret_key' => env('ACR_CONSOLE_SECRET_KEY'),

    'use'     => 'music',

    // identification API
    'project' => [
        'music' => [
            'host'       => env('ACR_MUSIC_HOST', 'https://identify-cn-north-1.acrcloud.com'),
            'access_key' => env('ACR_MUSIC_ACCESS_KEY'),
            'secret_key' => env('ACR_MUSIC_SECRET_KEY'),
        ]
    ]
];