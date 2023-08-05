<style>
    #{{ $id }} {
        position: {{ $position }};
        top: 0;
        bottom: 0;
        {{ $attributes['style'] && Str::contains($attributes['style'], 'width') ? $attributes['style'] : $attributes['style'] . 'width: 100%;' }}
    }

    .marker {
        display: block;
        border: none;
        cursor: pointer;
        padding: 0;
    }
</style>

<div id="{{ $id }}" class="{{ $attributes['class'] ?? '' }}"></div>

@include('mapbox::includes.script')
