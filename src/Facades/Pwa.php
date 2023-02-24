<?php

namespace Laravelir\Pwa\Facades;

use Illuminate\Support\Facades\Facade;

class Pwa extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pwa';
    }
}
