<?php

namespace Koossaayy\LaravelMapbox\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MapboxSearch extends Component
{
    public function __construct(
        public String $id,
        public String $placeholder = "Search",
        public array $center = [0, 0],
        public int $zoom = 8,
        public bool $navigationControls = false,
        public string $geocoderPosition = 'top-left',
        public bool $cooperativeGestures = false,
        public string $mapStyle = 'mapbox/streets-v11',
        public bool $rtl = false,
        public string $position = 'absolute',
    ) {
    }

    public function render(): View
    {
        return view('mapbox::components.mapbox-search');
    }
}
