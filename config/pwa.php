<?php

// config file for laravelir/pwa
return [
    'show_install_banner' => false,
    'sw' => [
        'cache' => [
            'name' => '',
            'assets' => [],
        ]
    ],
    'manifest'=> [
        'name' => env('APP_NAME', ''),
        'shot_name' => '',
        'dir' => 'ltr',
        'lang' => 'en',
        'icon' => [],
    ],
];
