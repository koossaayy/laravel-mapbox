<?php

namespace Koossaayy\LaravelMapbox\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Mapbox extends Component
{
    public function __construct(
        public String $id,
        public array $center = [0, 0],
        public int $zoom = 8,
        public bool $navigationControls = false,
        public bool $cooperativeGestures = false,
        public bool $rtl = false,
        public string $mapStyle = 'mapbox/streets-v11',
        public bool $interactive = true,
        public array $markers = [],
        public bool $draggable = false,
        public string $position = 'absolute',
    ) {
    }

    public function render(): View
    {
        return view('mapbox::components.mapbox');
    }
}
