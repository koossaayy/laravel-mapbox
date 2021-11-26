<script>
    mapboxgl.accessToken = '{{ config('mapbox.mapbox_token', null) }}';
    const map = new mapboxgl.Map({
        container: '{{ $id }}',
        style: 'mapbox://styles/{{ $mapStyle }}',
        center: [{{ $center['long'] ?? $center[0] }}, {{ $center['lat'] ?? $center[1] }}],
        zoom: {{ $zoom }},
        interactive: {{ $interactive ? 'true' : 'false' }},
    });

    {{ $navigationControls ? 'map.addControl(new mapboxgl.NavigationControl());' : '' }}

    map.on('load', function() {
        map.resize();
    });

    @foreach ($markers as $key => $marker)
        new mapboxgl.Marker()
        .setLngLat([{{ $marker['long'] }}, {{ $marker['lat'] }}])
        @isset($marker['description'])
            .setPopup(new mapboxgl.Popup({
            offset: 25
            }).setText('{{ $marker['description'] }}'))
        @endisset
        .addTo(map);
    @endforeach
</script>
