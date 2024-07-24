@extends('layouts.map')

@section('leaflet')
    <div id="map">
        @include('partials.sidebar')
        <script>
            // BASE MAP
            var map = L.map('map').setView([-7.9533314, 112.6583153], 11);
            var tiles = L.tileLayer(
                "https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    maxZoom: 20,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                }
            ).addTo(map);


            var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 20
            })

            var baseLayers = {
                "OpenStreetMap": tiles,
                "Dark": CartoDB_DarkMatter,
            };
            L.control.layers(baseLayers).addTo(map);

            const sidepanelLeft = L.control.sidepanel('mySidepanelLeft', {
                tabsPosition: 'left',
                startTab: 'tab-5'
            }).addTo(map);


            @foreach ($latlng as $data)
                var marker2 = L.marker([{{ $data->lat }}, {{ $data->lng }}]) // Koordinat baru
                    .addTo(map)
                    .bindPopup(
                        "<H2>{{ $data->nama_fasum }}</H2>{{ $data->alamat }} <br> <a href='/detail/{{ $data->id }}'> Detail </a> "
                    )
            @endforeach

            // Function untuk geolokasi
            var lc = L.control.locate({
                position: "topright"
            }).addTo(map);
        </script>
    @endsection

    @section('list')
    @endsection
