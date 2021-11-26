<?php

use Koossaayy\LaravelMapbox\Components\Mapbox;

it('can be rendered')
    ->blade('<x-mapbox id="map" />')
    ->assertSee('map');

it('can render navigation control', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'navigationControls' => true]);
    $view->assertSee('mapboxgl.NavigationControl()');
});


it('it can render markers', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'markers' => [
        ['lat' => '1', 'long' => '1'],
        ['lat' => '2', 'long' => '2'],
    ]]);
    $view->assertSee('mapboxgl.Marker()');
    $view->assertDontsee('description1');
});


it('it can render markers with description', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'markers' => [
        ['lat' => '1', 'long' => '1', 'description' => 'description1'],
        ['lat' => '2', 'long' => '2', 'description' => 'description2'],
    ]]);
    $view->assertSee('mapboxgl.Marker()');
    $view->assertSee('description1');
    $view->assertSee('description2');
});

it('it render an inactive map with interactive false', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'interactive' => false]);
    $view->assertSee('interactive: false');
});

it('it render an active map with interactive true', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'interactive' => true]);
    $view->assertDontSee('interactive: false');
});

it('can read token from config file', function () {
    config()->set('mapbox.mapbox_token', 'token');
    $view = $this->component(Mapbox::class, ['id' => 'map']);
    $view->assertSee('token');
});


it('render map with default style', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map']);
    $view->assertSee('mapbox://styles/mapbox/streets-v11');
});

it('can render map with custom style', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'mapStyle' => 'mapbox/navigation-night-v1']);
    $view->assertSee('mapbox://styles/mapbox/navigation-night-v1');
});

it('it can render map with center point', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'center' => ['long' => 12,'lat' => 10]]);
    $view->assertSee('[12, 10]');
    $view->assertDontsee('[10, 12]');
});


it('it can render map with zoom', function () {
    $view = $this->component(Mapbox::class, ['id' => 'map', 'zoom' => 10]);
    $view->assertSee('10');
});


it('can render map with the styles passed', function () {
    $view = $this->blade('<x-mapbox id="map" style="height: 500px; max-width:600px; width: 500px;" />');
    $view->assertSee('height: 500px; max-width:600px; width: 500px;');
});


it('render map with the correspendant classes', function () {
    $view = $this->blade('<x-mapbox id="map" class="helloworld"  style="height: 500px; max-width:600px; width: 500px;" />');
    $view->assertSee('helloworld');
});
