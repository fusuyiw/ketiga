@extends('utama.layouts.map')
@section('leaflet')
    <script>
        // BASE MAP
        var map = L.map('map', {
            zoomControl: false // Menonaktifkan kontrol zoom default
        }).setView([-7.9533314, 112.6583153], 11);

        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

        map.attributionControl.setPrefix(false);

        var stLayer = L.layerGroup().addTo(map);
        var rsLayer = L.layerGroup().addTo(map);
        var tkLayer = L.layerGroup().addTo(map);
        var ppLayer = L.layerGroup().addTo(map);
        var polsekLayer = L.layerGroup().addTo(map);
        var kpLayer = L.layerGroup().addTo(map);
        var ptLayer = L.layerGroup().addTo(map);

        // Function to create markers with custom data
        function createMarker(data, layer, iconType, markerColor) {
            var marker = L.marker([data.lat, data.lng], {
                    icon: L.AwesomeMarkers.icon({
                        icon: iconType,
                        prefix: 'fa',
                        markerColor: markerColor
                    }),
                    title: data.nama // Set the title for search to use
                })
                .bindPopup(
                    `<H4>${data.nama}</H4>${data.alamat} <br> <a href='/peta/${data.id}'> Lihat Selengkapnya </a>`
                );
            layer.addLayer(marker);
            return marker;
        }

        var allMarkers = []; // Array to hold all markers for search
        @foreach ($st as $data)
            var marker1 = createMarker({
                lat: {{ $data->lat }},
                lng: {{ $data->lng }},
                nama: "{{ $data->nama }}",
                alamat: "{{ $data->alamat }}",
                id: {{ $data->id }}
            }, stLayer, 'train', 'lightgray');
            allMarkers.push(marker1);
        @endforeach

        @foreach ($rs as $data)
            var marker2 = createMarker({
                lat: {{ $data->lat }},
                lng: {{ $data->lng }},
                nama: "{{ $data->nama }}",
                alamat: "{{ $data->alamat }}",
                id: {{ $data->id }}
            }, rsLayer, 'hospital', 'darkblue');
            allMarkers.push(marker2);
        @endforeach

        @foreach ($tk as $data)
            var marker3 = createMarker({
                lat: {{ $data->lat }},
                lng: {{ $data->lng }},
                nama: "{{ $data->nama }}",
                alamat: "{{ $data->alamat }}",
                id: {{ $data->id }}
            }, tkLayer, 'spa', 'green');
            allMarkers.push(marker3);
        @endforeach

        @foreach ($mall as $data)
            var marker4 = createMarker({
                lat: {{ $data->lat }},
                lng: {{ $data->lng }},
                nama: "{{ $data->nama }}",
                alamat: "{{ $data->alamat }}",
                id: {{ $data->id }}
            }, ppLayer, 'store', 'purple');
            allMarkers.push(marker4);
        @endforeach

        @foreach ($polsek as $data)
            var marker5 = createMarker({
                lat: {{ $data->lat }},
                lng: {{ $data->lng }},
                nama: "{{ $data->nama }}",
                alamat: "{{ $data->alamat }}",
                id: {{ $data->id }}
            }, polsekLayer, 'person-military-pointing', 'black');
            allMarkers.push(marker5);
        @endforeach

        @foreach ($kp as $data)
            var marker5 = createMarker({
                lat: {{ $data->lat }},
                lng: {{ $data->lng }},
                nama: "{{ $data->nama }}",
                alamat: "{{ $data->alamat }}",
                id: {{ $data->id }}
            }, kpLayer, 'landmark', 'red');
            allMarkers.push(marker5);
        @endforeach

        @foreach ($pt as $data)
            var marker5 = createMarker({
                lat: {{ $data->lat }},
                lng: {{ $data->lng }},
                nama: "{{ $data->nama }}",
                alamat: "{{ $data->alamat }}",
                id: {{ $data->id }}
            }, ptLayer, 'school', 'orange');
            allMarkers.push(marker5);
        @endforeach

        // GeoJSON Layers
        var geoLayer_blimbing = L.geoJson.ajax("geojson/Blimbing.geojson", {
            style: {
                color: "#ff3d33",
                weight: 3,
                opacity: 0.8,
                fillColor: "#ff3d33",
                fillOpacity: 0.2
            },
            onEachFeature: function(feature, layer) {
                layer.on('click', function() {
                    var modalContent = `<div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="featureModalLabel">${feature.properties.wiadkc}</h5>
                                                       </div>
                                                    <div class="modal-body">
                                                        <p>${feature.properties.KP} Kelurahan</p>
                                                        <p>Luas: ${feature.properties.luaswh} km²</p>
                                                        <p>Populasi: ${feature.properties.Populasi} Orang</p>
                                                        <p>Rumah Sakit: ${feature.properties.RS}</p>
                                                        <p>Sarana Transportasi: ${feature.properties.ST}</p>
                                                        <p>Taman Kota: ${feature.properties.TK}</p>
                                                        <p>Mall: ${feature.properties.MALL}</p>
                                                        <p>Perguruan Tinggi: ${feature.properties.PT}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                    $(modalContent).modal('show');
                });
            }
        }).addTo(map);

        var geoLayer_kedungkandang = L.geoJson.ajax("geojson/Kedungkandang.geojson", {
            style: {
                color: "#99ff33",
                weight: 3,
                opacity: 0.8,
                fillColor: "#99ff33",
                fillOpacity: 0.2
            },
            onEachFeature: function(feature, layer) {
                layer.on('click', function() {
                    var modalContent = `<div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="featureModalLabel">${feature.properties.wiadkc}</h5>
                                                       </div>
                                                    <div class="modal-body">
                                                       <p>${feature.properties.KP} Kelurahan</p>
                                                        <p>Luas: ${feature.properties.luaswh} km²</p>
                                                        <p>Populasi: ${feature.properties.Populasi} Orang</p>
                                                        <p>Rumah Sakit: ${feature.properties.RS}</p>
                                                        <p>Sarana Transportasi: ${feature.properties.ST}</p>
                                                        <p>Taman Kota: ${feature.properties.TK}</p>
                                                        <p>Mall: ${feature.properties.MALL}</p>
                                                        <p>Perguruan Tinggi: ${feature.properties.PT}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                    $(modalContent).modal('show');
                });
            }
        }).addTo(map);

        var geoLayer_Sukun = L.geoJson.ajax("geojson/Sukun.geojson", {
            style: {
                color: "#3385ff",
                weight: 3,
                opacity: 0.8,
                fillColor: "#3385ff",
                fillOpacity: 0.2
            },
            onEachFeature: function(feature, layer) {
                layer.on('click', function() {
                    var modalContent = `<div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="featureModalLabel">${feature.properties.wiadkc}</h5>
                                                       </div>
                                                    <div class="modal-body">
                                                        <p>${feature.properties.KP} Kelurahan</p>
                                                        <p>Luas: ${feature.properties.luaswh} km²</p>
                                                        <p>Populasi: ${feature.properties.Populasi} Orang</p>
                                                        <p>Rumah Sakit: ${feature.properties.RS}</p>
                                                        <p>Sarana Transportasi: ${feature.properties.ST}</p>
                                                        <p>Taman Kota: ${feature.properties.TK}</p>
                                                        <p>Mall: ${feature.properties.MALL}</p>
                                                        <p>Perguruan Tinggi: ${feature.properties.PT}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                    $(modalContent).modal('show');
                });
            }
        }).addTo(map);

        var geoLayer_Lowokwaru = L.geoJson.ajax("geojson/Lowokwaru.geojson", {
            style: {
                color: "#c300ff",
                weight: 3,
                opacity: 0.8,
                fillColor: "#d694eb",
                fillOpacity: 0.2
            },
            onEachFeature: function(feature, layer) {
                layer.on('click', function() {
                    var modalContent = `<div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="featureModalLabel">${feature.properties.wiadkc}</h5>
                                                       </div>
                                                    <div class="modal-body">
                                                        <p>${feature.properties.KP} Kelurahan</p>
                                                        <p>Luas: ${feature.properties.luaswh} km²</p>
                                                        <p>Populasi: ${feature.properties.Populasi} Orang</p>
                                                        <p>Rumah Sakit: ${feature.properties.RS}</p>
                                                        <p>Sarana Transportasi: ${feature.properties.ST}</p>
                                                        <p>Taman Kota: ${feature.properties.TK}</p>
                                                        <p>Mall: ${feature.properties.MALL}</p>
                                                        <p>Perguruan Tinggi: ${feature.properties.PT}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                    $(modalContent).modal('show');
                });
            }
        }).addTo(map);

        var geoLayer_Klojen = L.geoJson.ajax("geojson/Klojen.geojson", {
            style: {
                color: "#ffe733",
                weight: 3,
                opacity: 0.8,
                fillColor: "#ffe733",
                fillOpacity: 0.2
            },
            onEachFeature: function(feature, layer) {
                layer.on('click', function() {
                    var modalContent = `<div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="featureModalLabel">${feature.properties.wiadkc}</h5>
                                                       </div>
                                                    <div class="modal-body">
                                                        <p>${feature.properties.KP} Kelurahan</p>
                                                        <p>Luas: ${feature.properties.luaswh} km²</p>
                                                        <p>Populasi: ${feature.properties.Populasi} Orang</p>
                                                        <p>Rumah Sakit: ${feature.properties.RS}</p>
                                                        <p>Sarana Transportasi: ${feature.properties.ST}</p>
                                                        <p>Taman Kota: ${feature.properties.TK}</p>
                                                        <p>Mall: ${feature.properties.MALL}</p>
                                                        <p>Perguruan Tinggi: ${feature.properties.PT}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                    $(modalContent).modal('show');
                });
            }
        }).addTo(map);

        // Base Layers for IconLayers control
        var baseLayers = [{
                name: "Open Street Map",
                icon: "{{ asset('img/ops.png') }}",
                layer: L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map),
                title: "Open Street Map"
            },
            {
                name: "Google Map",
                icon: "{{ asset('img/google.png') }}",
                layer: L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }),
                title: "Google Map"
            },
            {
                name: "Esri World Imagery",
                icon: "{{ asset('img/satelit.png') }}",
                layer: L.tileLayer(
                    "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}"
                ),
                title: "Satelit ESRI"
            }
        ];

        // Overlays for PanelLayers control
        var overlays = [{
            group: "Fasilitas Umum",
            layers: [{
                    name: "Sarana Transportasi",
                    layer: stLayer
                },
                {
                    name: "Rumah Sakit",
                    layer: rsLayer
                },
                {
                    name: "Taman",
                    layer: tkLayer
                },
                {
                    name: "Mall",
                    layer: ppLayer
                },
                {
                    name: "Polsek",
                    layer: polsekLayer
                },
                {
                    name: "Kantor Pemerintahan",
                    layer: kpLayer
                },
                {
                    name: "Perguruan Tinggi",
                    layer: ptLayer
                }
            ]
        }, {
            group: "Kecamatan",
            layers: [{
                    name: "Blimbing",
                    layer: geoLayer_blimbing
                },
                {
                    name: "Kedungkandang",
                    layer: geoLayer_kedungkandang
                },
                {
                    name: "Sukun",
                    layer: geoLayer_Sukun
                },
                {
                    name: "Lowokwaru",
                    layer: geoLayer_Lowokwaru
                },
                {
                    name: "Klojen",
                    layer: geoLayer_Klojen
                }
            ]
        }];
        // Cuaca
        const apiKey = 'e150d4fb21916798dfbb0c325dfe3449';
        L.control.weather({
            apiKey
        }).addTo(map);

        var panelLayers = new L.Control.PanelLayers([], overlays, {
            compact: true,
            selectorGroup: true,
            collapsibleGroups: true
        });
        map.addControl(panelLayers);

        var lc = L.control.locate({
            position: "bottomright"
        }).addTo(map);

        L.control.rainviewer({
            position: 'topleft'
        }).addTo(map);

        // Inisialisasi kontrol pencarian
        var controlSearch = new L.Control.Search({
            layer: L.layerGroup(allMarkers), // Gabungkan semua marker ke dalam satu layer
            propertyName: 'title', // Properti yang akan dicari
            marker: false, // Tidak menggunakan marker bawaan Leaflet
            moveToLocation: function(latlng, title, map) {
                map.setView(latlng, 17); // Zoom peta saat marker ditemukan
            }
        });
        map.addControl(controlSearch);


        // Icon Layer
        var control = new L.Control.IconLayers(
            baseLayers, {
                position: 'bottomleft', // Position of the control
                maxLayersInRow: 5, // Maximum number of layers in one row
                title: function(layer) {
                    return layer.title;
                } // Set title for each layer
            }
        ).addTo(map);

        // Reset View
        L.control.resetView({
            position: "topleft",
            title: "Reset view",
            latlng: L.latLng([-7.9533314, 112.6583153]),
            zoom: 11,
        }).addTo(map);
    </script>
@endsection
