<?php

// config file for laravelir/pwa
return [
    'logger' => env('APP_DEBUG'),
    
    'manifest' => [
        'name' => env('APP_NAME', ''),
        'shot_name' => '',
        'start_url' => '/',
        'background_color' => '#00be9c',
        'theme_color' => '#1c3c50',
        'display' => 'standalone',
        'orientation' => 'any',
        'dir' => 'ltr',
        'lang' => 'en',
        'icons' => [
            '72×72' => '/images/icons/icon-72×72.png',
            '96×96' => '/images/icons/icon-96×96.png',
            '128×128' => '/images/icons/icon-128×128.png',
            '144×144' => '/images/icons/icon-144×144.png',
            '152×152' => '/images/icons/icon-152×152.png',
            '192×192' => '/images/icons/icon-192×192.png',
            '384×384' => '/images/icons/icon-384×384.png',
            '512×512' => '/images/icons/icon-512×512.png'
        ],
        'splash' => [
            '640×1136' => '/images/icons/splash-640×1136.png',
            '750×1334' => '/images/icons/splash-750×1334.png',
            '828×1792' => '/images/icons/splash-828×1792.png',
            '1125×2436' => '/images/icons/splash-1125×2436.png',
            '1242×2208' => '/images/icons/splash-1242×2208.png',
            '1242×2688' => '/images/icons/splash-1242×2688.png',
            '1536×2048' => '/images/icons/splash-1536×2048.png',
            '1668×2224' => '/images/icons/splash-1668×2224.png',
            '1668×2388' => '/images/icons/splash-1668×2388.png',
            '2048×2732' => '/images/icons/splash-2048×2732.png',
        ],
    ],
    'show_install_banner' => false,
    'sw' => [
        'cache' => [
            'name' => '',
            'assets' => [],
        ]
    ],

];
