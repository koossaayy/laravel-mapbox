<?php

namespace Koossaayy\LaravelMapbox\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Koossaayy\LaravelMapbox\LaravelMapbox
 */
class LaravelMapbox extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-mapbox';
    }
}
