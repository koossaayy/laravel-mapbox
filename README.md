# Easily Integration of Mapbox inside your Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/koossaayy/laravel-mapbox/run-tests?label=tests)](https://github.com/koossaayy/laravel-mapbox/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/koossaayy/laravel-mapbox/Check%20&%20fix%20styling?label=code%20style)](https://github.com/koossaayy/laravel-mapbox/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)

---
Easily inetgrate mapbox maps to your Laravel app using only blade components. 


## Installation

You can install the package via composer:

```bash
composer require koossaayy/laravel-mapbox
```

After installing the package, create an account [here](https://mapbox.com) and get yor token. 

Then  add this configuration line to your ```.env``` file

```
MAPBOX_TOKEN={your mapbox token here}
```
For example 
```
MAPBOX_TOKEN=pk.eyJ1IjoiiJjddd20yaDIzdmgwzWpqMm9vMDVrb3I1c2QzIn0.jepDEulAySscpF3o3w
```

lastly, publish your config file with:
```bash
php artisan vendor:publish --tag="mapbox-config"
```

This is the contents of the published config file:

```php
return [
    'mapbox_token' => (env('MAPBOX_TOKEN', null))
];
```

## Usage

The goal of this package is to use Blade components to render Mapbox GL maps. 
To show a basic map, you can use this component with the ```id``` param :
```html
<x-mapbox id="mapId" />
```



Also you can show/hide navigation controls (Zoom in/Zoom out/Rotation): 
```html
<x-mapbox id="mapId" :navigationControls="true" />
```
Here's a full example, with all options you can use: 

```html
<x-mapbox 
    id="map" 
    class="hellomap" 
    style="height: 500px; width: 500px;" 
    mapStyle="mapbox/navigation-night-v1"
    :center="['long' => 8, 'lat'=>10]"
    :navigationControls="true"
    :interactive="false"
    :markers="[['lat' => 8,'long' => 10,'description' => 'helloworld' ], ['lat'=> 9,'long' => 10]]" />


```


## Testing

This package is tested using PestPHP

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Support Spatie

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-mapbox.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-mapbox)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).


## Credits

- [koossaayy](https://github.com/koossaayy)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
