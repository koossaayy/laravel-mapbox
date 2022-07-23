<?php

namespace Koossaayy\LaravelMapbox;

use Illuminate\Support\Facades\Blade;
use Koossaayy\LaravelMapbox\Components\Mapbox;
use Koossaayy\LaravelMapbox\Components\MapboxSearch;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMapboxServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-mapbox')
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted()
    {
        Blade::component('mapbox', Mapbox::class);
        Blade::component('mapbox-search', MapboxSearch::class);
    }
}
