<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="css/style-map.css">

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.css">

    {{-- Leaflet Rain --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.css" />
    {{-- Leaflet Marker Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/leaflet.awesome-markers.css">

    {{-- Leaflet Panel Layer --}}
    <link rel="stylesheet" href="css/leaflet-panel-layers.css" />

    {{-- Geolokasi --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.81.1/dist/L.Control.Locate.min.css" />

    {{-- Search --}}
    <link rel="stylesheet" href="css/leaflet-search.src.css">

    {{-- Icon Layer --}}
    <link rel="stylesheet" href="iconlayer/iconLayers.css">

    {{-- OpenWeatherMap --}}
    <link href="css/Leaflet.Weather.css" rel="stylesheet" type="text/css" />
</head>

<body>
    @include('utama.partials/navbar')

    <!-- Modal -->
    <div class="modal fade" id="weatherModal" aria-labelledby="weatherModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="weatherModalLabel">Informasi Cuaca</h5>
                </div>
                <div class="modal-body" id="weatherDetails">
                </div>
                <div class="modal-footer">
                    Provider openweathermap.org
                </div>
            </div>
        </div>
    </div>

    <section id="features" class="features">
        <div id="map">
        </div>
    </section>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6b172e2a5f.js" crossorigin="anonymous"></script>

    {{-- Leaflet --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.81.1/dist/L.Control.Locate.min.js" charset="utf-8">
    </script>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>
    <script src="js/leaflet-panel-layers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.js"></script>

    {{-- Marker --}}
    <script src="js/leaflet.awesome-markers.js"></script>
    <script src="{{ asset('js/markers.js') }}"></script>

    {{-- Marker --}}
    <script src="js/leaflet-search.src.js"></script>

    {{-- Icon Layer --}}
    <script src="iconlayer/iconLayers.js"></script>

    {{-- BMKG --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/Leaflet.Weather.js"></script>



    @yield('leaflet')
</body>

</html>
