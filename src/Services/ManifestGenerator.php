<?php

namespace Laravelir\Pwa\Services;

class ManifestGenerator
{
    public function generate(): array
    {
        $manifest = [
            'name' => config('pwa.manifest.name'),
            'short_name' => config('pwa.manifest.short_name'),
            'description' => config('pwa.manifest.description'),
            'start_url' => asset(config('pwa.manifest.start_url')),
            'background_color' => config('pwa.manifest.background_color'),
            'theme_color' => config('pwa.manifest.theme_color'),
            'display' => config('pwa.manifest.display'),
            'status_bar' => config('pwa.manifest.status_bar'),
            'orientation' => config('pwa.manifest.orientation'),
            'dir' => config('pwa.manifest.dir'),
            'lang' => config('pwa.manifest.lang'),
            //'splash' => config('pwa.manifest.splash')
        ];

        foreach (config('pwa.manifest.icons') as $size => $value) {
            $manifest['icons'][] = [
                'src' => $value['src'],
                'type' => $value['type'],
                'sizes' => $size,
                'purpose' => $value['purpose']
            ];
        }

        if (config('pwa.manifest.shortcuts')) {
            foreach (config('pwa.manifest.shortcuts') as $shortcut) {
                if (array_key_exists("icons", $shortcut)) {
                    $icon = [
                        'src' => $shortcut['icons']['src'],
                        'type' => $shortcut['icons']['type'],
                        'purpose' => $shortcut['icons']['purpose'],
                        'sizes' => $shortcut['icons']['sizes']
                    ];
                } else {
                    $icon = [];
                }

                $manifest['shortcuts'][] = [
                    'name' => $shortcut['name'],
                    'description' => $shortcut['description'],
                    'url' => $shortcut['url'],
                    $icon
                ];
            }
        }

//        foreach (config('pwa.manifest.related_applications') as $tag => $value) {
//            $manifest[$tag] = $value;
//        }
//
//        foreach (config('pwa.manifest.custom') as $tag => $value) {
//            $manifest[$tag] = $value;
//        }
//
        return $manifest;
    }
}
