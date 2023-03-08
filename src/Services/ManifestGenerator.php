<?php

namespace Laravelir\Pwa\Services;

class ManifestGenerator
{
    public function generate()
    {
        $config = json_encode(config('pwa')->all());

    }
}
