<script>
    mapboxgl.accessToken = '{{ config('mapbox.mapbox_token', null) }}';
    @if ($rtl ?? '')
        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true
        );
    @endif
    const map{{ $id }} = new mapboxgl.Map({
        container: '{{ $id }}',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [{{ $center['long'] ?? $center[0] }}, {{ $center['lat'] ?? $center[1] }}],
        zoom: {{ $zoom }},
        cooperativeGestures: {{ $cooperativeGestures ? 'true' : 'false' }},

    });

    {{ $navigationControls ? 'map.addControl(new mapboxgl.NavigationControl());' : '' }}


    let geocoder{{ $id }} = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });

    map{{ $id }}.addControl(geocoder{{ $id }}, '{{ $geocoderPosition }}');
</script>
