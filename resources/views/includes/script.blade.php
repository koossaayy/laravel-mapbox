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
        style: 'mapbox://styles/{{ $mapStyle }}',
        center: [{{ $center['long'] ?? $center[0] }}, {{ $center['lat'] ?? $center[1] }}],
        zoom: {{ $zoom }},
        interactive: {{ $interactive ? 'true' : 'false' }},
        cooperativeGestures: {{ $cooperativeGestures ? 'true' : 'false' }},
    });

    {{ $navigationControls ? 'map.addControl(new mapboxgl.NavigationControl());' : '' }}

    map{{ $id }}.on('load', function() {
        map{{ $id }}.resize();
    });


    @if ($draggable ?? '')
        let long{{ $id }} = 0;
        let lat{{ $id }} = 0;
        const marker{{ $id }} = new mapboxgl.Marker({
                draggable: true
            })
            .setLngLat([0, 0])
            .addTo(map{{ $id }});
    @endif

    let markerInLoop{{ $id }}

    @foreach ($markers as $key => $marker)

        @if (isset($marker['icon']))

            const el{{ $key }} = document.createElement('div');
            el{{ $key }}.className = 'marker';
            el{{ $key }}.innerHTML = `{!! $marker['icon'] !!}`;

            markerInLoop{{ $id }} = new mapboxgl.Marker(el{{ $key }});
        @else

            markerInLoop{{ $id }} = new mapboxgl.Marker();
        @endif

        markerInLoop{{ $id }}.setLngLat([{{ $marker['long'] }}, {{ $marker['lat'] }}]);

        @isset($marker['description'])

            markerInLoop{{ $id }}.setPopup(new mapboxgl.Popup({
                offset: 25
            }).setText('{{ $marker['description'] }}'))
        @endisset

        markerInLoop{{ $id }}.addTo(map{{ $id }});
    @endforeach

    markerInLoop{{ $id }} = undefined;
</script>
