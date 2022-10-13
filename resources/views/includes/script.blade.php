<script>
    mapboxgl.accessToken = '{{ config('mapbox.mapbox_token', null) }}';

    @if ($rtl ?? '')
        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true
        );
    @endif

    const map = new mapboxgl.Map({
        container: '{{ $id }}',
        style: 'mapbox://styles/{{ $mapStyle }}',
        center: [{{ $center['long'] ?? $center[0] }}, {{ $center['lat'] ?? $center[1] }}],
        zoom: {{ $zoom }},
        interactive: {{ $interactive ? 'true' : 'false' }},
        cooperativeGestures: {{ $cooperativeGestures ? 'true' : 'false' }},
    });

    {{ $navigationControls ? 'map.addControl(new mapboxgl.NavigationControl());' : '' }}

    map.on('load', function() {
        map.resize();
    });


    @if ($draggable ?? '')
        let long = 0;
        let lat = 0;
        const marker = new mapboxgl.Marker({
                draggable: true
            })
            .setLngLat([0, 0])
            .addTo(map);
    @endif

    @foreach ($markers as $key => $marker)


        @if (isset($marker['icon']))
            const el{{ $key }} = document.createElement('div');
            el{{ $key }}.className = 'marker';
            el{{ $key }}.innerHTML = `{!! $marker['icon'] !!}`;
            new mapboxgl.Marker(el{{ $key }})
                .setLngLat([{{ $marker['long'] }}, {{ $marker['lat'] }}])
            @isset($marker['description'])
                .setPopup(new mapboxgl.Popup({
                    offset: 25
                }).setText('{{ $marker['description'] }}'))
            @endisset
            .addTo(map);
        @else
            new mapboxgl.Marker()
                .setLngLat([{{ $marker['long'] }}, {{ $marker['lat'] }}])
            @isset($marker['description'])
                .setPopup(new mapboxgl.Popup({
                    offset: 25
                }).setText('{{ $marker['description'] }}'))
            @endisset
            .addTo(map);
        @endif
    @endforeach
</script>
