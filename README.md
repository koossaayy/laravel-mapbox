# Laravel Mapbox

Easily Integration of Mapbox inside your Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/koossaayy/laravel-mapbox/run-tests.yml?branch=main)](https://github.com/koossaayy/laravel-mapbox/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/koossaayy/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/koossaayy/laravel-mapbox)

---


![Laravel Mapbox](https://banners.beyondco.de/Laravel%20Mapbox.png?theme=dark&packageManager=composer+require&packageName=koossaayy%2Flaravel-mapbox&pattern=architect&style=style_1&description=Easily+Integrate+Mapbox+into+your+Laravel+application&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)


Easily inetgrate mapbox maps to your Laravel app using only blade components. 


## Installation

You can install the package via composer:

```bash
composer require koossaayy/laravel-mapbox
```

After installing the package, [create an account](https://mapbox.com) on MapBox and get your token. 

Expose that token in your `.env` file as below:

```
MAPBOX_TOKEN={your mapbox token here}
```
For example 

```
MAPBOX_TOKEN=pk.eyJ1IjoiiJjddd20yaDIzdmgwzWpqMm9vMDVrb3I1c2QzIn0.jepDEulAySscpF3o3w
```

Don't forget to publish your config file using:
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

Before starting using this component, you must include the CSS and JS files in the file where you want to display your map:

```html
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>
```

To show a basic map, you can use the component as follows :
```html
<x-mapbox id="mapId" />
```

Note: The `id` parameter is mandatory since it's used by Mapbox JS. 

Next, here's how you can use the component with other options:

In some scenarios, you may want to control the `position` CSS attribute of the map, you can do that with the `position` parameter. 
The default value will be `absolute` as the documentation in Mapbox.
```html
<x-mapbox id="mapId" position="relative" />
```

To show/hide navigation controls (Zoom in/Zoom out/Rotation), you can the use `:navigationControls` attribute as follows: 
```html
<x-mapbox id="mapId" :navigationControls="true" />
```

To customize the map style (not to be confused with default style like width and height...), using either [Mapbpox predefined styles or your own styles](https://docs.mapbox.com/mapbox-gl-js/api/map/#:~:text=to%20ScrollZoomHandler%23enable%20.-,options.style,-(Object%20%7C%20string)), you can use the `mapStyle` attribute as follows : 

```html
<x-mapbox id="mapId" mapStyle="mapbox/navigation-night-v1"/>
```

Note: Providing a wrong style identifier will result in some glitches while showing the map. 

To center the camera of the map, on a certain point, you can use the `:center` attribute as follows:

```html
<x-mapbox id="mapId" :center="['long' => 8, 'lat' => 10]"/>
```

To control the map interactivity (Enable/Disable mouse events like dragging or zooming), you can use 
the `:interactive` attribute, as follows :

```html
<x-mapbox id="mapId" :interactive="false"/>
```

To add markers to your map, you can use the `:markers` attribute, as follows :

```html
<x-mapbox id="mapId"
 :markers="[['lat' => 8, 'long' => 10, 'description' => 'helloworld'], ['lat'=> 9, 'long' => 10]]" />
```


The `:markers` attribute accepts an array of arrays, each array must have at least the `long` and `lat` keys. 
If you want to add a popup description, you may use the `description` key.

Also you can customize the marker icons, instead of using the default ones provided by Mapbox. 
To do so you can add `icon` key to the array of markers as follows: 
```php
$icon = '<img src="https://placekitten.com/g/50/50" style="border-radius: 50%" />';
```


```html
<x-mapbox id="mapId"
 :markers="[['lat' => 8, 'long' => 10, 'description' => 'helloworld', 'icon' => $icon], ['lat'=> 9, 'long' => 10]]" />
```

> **Note**
> Please notice that `icon` key accepts HTML, and it will render it, so if you are getting your data from your users, please make sure to sanitize it before using it. 

> **Note**
> It's recommended to keep the number of markers to a max of 20, for performance reasons.



To control the style of the map (width, height, etc... Not to be confused with the `mapStyle` attribute), you can use the `style` and `class` attributes as follows : 

```html
<x-mapbox id="mapId" style="height: 500px; width: 500px;" class="hellomap"/>
```

To add RTL support to show Arabic/Hebrew, etc... names correctly, you can use the `:rtl` attribute, as follows

```html
<x-mapbox id="mapId" style="height: 500px; width: 500px;" :rtl="true"/>
```

To add cooperative gestures (This allows the user to scroll the page without unintentionally zooming or panning the map.), you may use `:cooperativeGestures` attribute as follows: 

```html
<x-mapbox id="mapId" style="height: 500px; width: 500px;" :cooperativeGestures="true"/>
```

In some cases, you want a draggable marker, for example, when you want the end user to select a point on the map and then return its coordinates, in that case, you can use the `:draggable` attribute as follows:

```html
<x-mapbox id="mapId" style="height: 500px; width: 500px;" :draggable="true"/>
```

This will render a draggable marker. In order to get the coordinates of the marker, you must add the following JavaScriot code after the `<x-mapbox />` component as follows:

```js
marker.on('dragend', function(e) {
    /*here you can get the coordinates as follows 
    * e.target.getLngLat().lng : to get the longitude
    * e.target.getLngLat().lat : to get the latitude
    */
});
```

Here's a full example, with all options being used: 

```html
<x-mapbox 
    id="map" 
    class="hellomap" 
    style="height: 500px; width: 500px;" 
    mapStyle="mapbox/navigation-night-v1"
    :center="['long' => 8, 'lat' => 10]"
    :navigationControls="true"
    :interactive="false"
    :markers="[['long' => 8, 'lat' => 10,'description' => 'helloworld'], ['long' => 9, 'lat' => 10]]" />
```

In addition to regular map component, we added the map search component. This will add a search bar into the map container, and will allow the end user to search for places. <br>
Before start using the search component, you must add the Mapbox geocoding plugin.
```html
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

```
> **Note**
> The plugin must be imported after the Mapbox JS and CSS files.



After importing the geocoding plugin, now you can use the search component as follows: <br>
```html
<x-mapbox-search id="mapId" />
```
The example below, is the search component with full options: <br>
```html
<x-mapbox-search 
        id="mapId" 
        placeholder="Search" 
        :center="[14, 17]" 
        :zoom="2" 
        :navigationControls="true"
        geocoderPosition="top-left"
        :rtl="true"
        :cooperativeGestures="true"
    />
```
As the example illustrates, the only difference here is the geocoder position, which is the position of the search input. It can be one of those `['top-left', 'top-right', 'bottom-left','bottom-right']`

In order to listen to the change event, you need to add the `result` event listener, so you can get the result object. 
```js
geocoder.on('result', function(event) {
    /**
    * Here you can lisen to the result event and get the result
    * for example you can get the longitude, atitude, and the place name as follows:
    * const long = event.result.geometry.coordinates[0];
    * const lat = event.result.geometry.coordinates[1];
    * const name = name = event.result.place_name;
    */
});
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

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
