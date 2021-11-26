<?php

namespace Koossaayy\LaravelMapbox\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Mapbox extends Component
{

    public function __construct(
        public String $id,
        public array $center = [0,0],
        public int $zoom=8,
        public bool $navigationControls = false,
        public string $mapStyle = 'mapbox/streets-v11',
        public bool $interactive = true,
        public array $markers = [],
    )
    {

    }

    public function render(): View
    {
        return view('mapbox::components.mapbox');
    }
}
