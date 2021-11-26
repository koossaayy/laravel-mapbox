<style>
    #{{ $id }} {
        position: absolute;
        top: 0;
        bottom: 0;
        {{ $attributes['style'] && Str::contains($attributes['style'], 'width') ? $attributes['style'] : $attributes['style'] . 'width: 100%;' }}
    }

</style>

<div id="{{ $id }}" class="{{ $attributes['class'] ?? '' }}"></div>

@include('mapbox::includes.script')

