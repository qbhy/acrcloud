<?php

return [
    'debug'              => true,
    // console API
    'console_host'       => env('ACR_CONSOLE_HOST', 'https://cn-api.acrcloud.com'),
    'console_access_key' => env('ACR_CONSOLE_ACCESS_KEY'),
    'console_secret_key' => env('ACR_CONSOLE_SECRET_KEY'),

    // identification API
    'project'            => [
        'project_name' => [
            'host'       => 'https://identify-cn-north-1.acrcloud.com',
            'access_key' => 'your project access key',
            'secret_key' => 'your project secret key',
        ]
    ]
];