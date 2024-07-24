@extends('utama.layouts.detil')

@section('leaflet')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <br>
                <h3>Informasi {{ $detail->category->nama }}</h3><br>
                <!-- Tabel Vertikal -->
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Nama {{ $detail->category->nama }}</th>
                            <td>{{ $detail->nama }}</td>
                        </tr>
                        <tr>
                            @if (!empty($detail->tipe))
                                <th scope="row">Kelas</th>
                                <td>{{ $detail->tipe }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>{{ $detail->alamat }}, {{ $detail->kelurahan->nama }},
                                {{ $detail->kelurahan->kecamatan->nama }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Informasi layanan</th>
                            <td>{{ $detail->deskripsi }}, <b>{{ $detail->telpon }}</b></td>
                        </tr>
                        <tr>
                            <th scope="row">Waktu Pelayanan</th>
                            <td>{{ $detail->pelayanan }}</td>
                        </tr>
                        <tr>
                            @if (!empty($detail->web))
                                <th scope="row">Web Resmi</th>
                                <td>
                                    <p><a href="{{ $detail->web }}" target="blank"
                                            class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                            {{ $detail->web }}</a></p>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>

                @if ($detail->images)
                    @if (count($detail->images) > 1)
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($detail->images as $index => $image)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="card">
                                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid img-thumbnail"
                                                data-toggle="modal" data-target="#imageModal"
                                                data-image="{{ asset('storage/' . $image) }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $detail->images[0]) }}" class="img-fluid img-thumbnail"
                                    data-toggle="modal" data-target="#imageModal"
                                    data-image="{{ asset('storage/' . $detail->images[0]) }}">
                            </div>
                        </div>
                    @endif
                @else
                    <p>{{ $detail->nama }}</p>
                @endif

            </div>
            <!-- Kontainer Leaflet -->
            <div class="col-md-5">
                <br>
                <h3>Lokasi {{ $detail->nama }}</h3><br>
                <div id="map" style="height: 400px;"></div>
                <!-- Tombol Navigasi -->
                <div class="text-center mt-3">
                    <button id="startNavigation" class="btn btn-outline-success"><i class="bi bi-map-fill"></i> Mulai
                        Navigasi</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    {{-- Leaflet --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Koordinat
            var lat = {{ $detail->lat }};
            var lng = {{ $detail->lng }};

            // BASE MAP
            var map = L.map('map').setView([lat, lng], 15);
            var tiles = L.tileLayer(

                "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {
                    maxZoom: 20,
                }
            )

            var CartoDB_DarkMatter = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);

            var baseLayers = {
                "Satelit ESRI": tiles,
                "Google Map": CartoDB_DarkMatter,
            }
            map.attributionControl.setPrefix(false);

            L.control.layers(baseLayers).addTo(map);

            // LOKASI

            var pulsingIcon = L.icon.pulse({
                iconSize: [14, 14],
                color: 'blue'
            });
            var marker = L.marker([lat, lng], {
                icon: pulsingIcon
            }).addTo(map)

            var marker2 = L.marker([lat, lng]) // Koordinat baru
                .addTo(map)
                .bindPopup("<h2>{{ $detail->nama_fasum }}</h2>{{ $detail->alamat }}")
                .openPopup();


            // Function untuk geolokasi
            var lc = L.control.locate({
                position: "bottomright",
                {{-- icon: pulsingIcon --}}
            }).addTo(map)

            // Tambahkan kontrol fullscreen
            L.control.fullscreen().addTo(map);
            L.control.resetView({
                position: "topleft",
                title: "Reset view",
                latlng: L.latLng([lat, lng]),
                zoom: 15,
            }).addTo(map);
            // Layar penuh
            map.on('enterFullscreen', function() {
                if (window.console) window.console.log('enterFullscreen');
            });
            map.on('exitFullscreen', function() {
                if (window.console) window.console.log('exitFullscreen');
            });

            // Event listener untuk tombol navigasi
            document.getElementById('startNavigation').addEventListener('click', function() {
                map.locate({
                    setView: true // Menyesuaikan peta dengan lokasi
                });

                // Membuka Google Maps dengan rute dari lokasi pengguna ke tujuan
                var url =
                    `https://www.google.com/maps/dir/?api=1&origin=&destination=${lat},${lng}&travelmode=driving`;
                window.open(url, '_blank');
            });

        });
    </script>
    <script>
        $('#imageModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var image = button.data('image'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#modalImage').attr('src', image);
        });
    </script>
@endsection
