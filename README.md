# Easily Integration of Mapbox inside your Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/koossaayy/laravel-mapbox/run-tests?label=tests)](https://github.com/koossaayy/laravel-mapbox/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/koossaayy/laravel-mapbox/Check%20&%20fix%20styling?label=code%20style)](https://github.com/koossaayy/laravel-mapbox/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)

---

<img src="https://banners.beyondco.de/Laravel%20Mapbox.png?theme=dark&packageManager=composer+require&packageName=koossaayy%2Flaravel-mapbox&pattern=architect&style=style_1&description=Easily+Integrate+Mapbox+into+your+Laravel+application&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" >

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

Before start using the component, you must include the CSS and JS files in the file where you want to add your map: 
```html
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>

```

To show a basic map, you can use the component as follows :
```html
<x-mapbox id="mapId" />
```

Note: The ```id``` parameter is mandatory since int's used by Mapbox JS. 

Next, here's how you can use the component with other options.


To show/hide navigation controls (Zoom in/Zoom out/Rotation), you can use ``` :navigationControls ``` attirbute  as follows: 
```html
<x-mapbox id="mapId" :navigationControls="true" />
```
To customize the map style (not to be confused with default style like width and height...), using either [Mapbpox predefined styles or your own styles](https://docs.mapbox.com/mapbox-gl-js/api/map/#:~:text=to%20ScrollZoomHandler%23enable%20.-,options.style,-(Object%20%7C%20string)), you can use ``` mapStyle ``` attribute as follows : 

```html
<x-mapbox id="mapId" mapStyle="mapbox/navigation-night-v1"/>
```

Note : Providing a wrong style identifier will result some glitches in showing the map. 

To center the camera of the map, in a certain point, you can use ``` :center ``` attribute as follows:

```html
<x-mapbox id="mapId" :center="['long' => 8, 'lat'=>10]"/>
```

To control the map interactivity (Enable/Disable mouse events like dragging or zooming), you may use 
the ``` :interactive ``` attribute, as follows :

```html
<x-mapbox id="mapId" :interactive="false"/>
```

To add markers to your map, you can use the ``` :markers ``` attribute, as follows :

```html
<x-mapbox id="mapId"
 :markers="[['lat' => 8,'long' => 10,'description' => 'helloworld' ], ['lat'=> 9,'long' => 10]]" />
```
The ``` :markers ``` attribute accepts an array of arrays, each array have a ``` long ``` and ``` lat ``` keys. 
If you want to add a popup description, you may use the ``` description ``` key.

It's recommended to add around 20 markers to each map, for performance reasons.

To control the style of the map (width, height, etc... Not to be confused with mapStyle attribute), you can use the   ``` style ``` and ``` class ``` attributes as follows : 

```html
<x-mapbox id="mapId" style="height: 500px; width: 500px;" class="hellomap"/>
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
    :markers="[['long' => 8,'lat' => 10,'description' => 'helloworld' ], ['long'=> 9,'lat' => 10]]" />
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
