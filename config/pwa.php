<?php

// config file for laravelir/pwa
return [
    'logger' => env('APP_DEBUG'),
    'show_install_banner' => false,

    'manifest' => [
        'name' => env('APP_NAME', ''),
        'shot_name' => '',
        'description' => '',
        'start_url' => '/?source=pwa',
        'background_color' => '#00be9c',
        'theme_color' => '#1c3c50',
        'display' => 'standalone', // browser, fullscreen, minimal-ui
        'status_bar' => 'black',
        'orientation' => 'any',
        'dir' => 'ltr',
        'lang' => 'en',
        'icons' => [
            '72×72' => [
                'src' => '/images/icons/icon-72×72.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
            '96×96' => [
                'src' => '/images/icons/icon-96×96.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
            '128×128' => [
                'src' => '/images/icons/icon-128×128.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
            '144×144' => [
                'src' => '/images/icons/icon-144×144.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
            '152×152' => [
                'src' => '/images/icons/icon-152×152.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
            '192×192' => [
                'src' => '/images/icons/icon-192×192.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
            '384×384' => [
                'src' => '/images/icons/icon-384×384.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
            '512×512' => [
                'src' => '/images/icons/icon-512×512.png',
                'purpose' => 'any',
                'type' => 'image/png',
            ],
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
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
    ],
    'metas' => [

    ],
    'sw' => [
        'cache' => [
            'name' => '',
            'assets' => [],
        ]
    ],
    'custom' => [],
];
