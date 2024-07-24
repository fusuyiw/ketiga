<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.ico') }}" />

    {{-- leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.6.0/Control.FullScreen.css" />
    <script src="https://rawgit.com/mapshakers/leaflet-icon-pulse/master/src/L.Icon.Pulse.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/mapshakers/leaflet-icon-pulse/master/src/L.Icon.Pulse.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.css">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- geolokasi --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.81.0/dist/L.Control.Locate.min.css" />

    {{-- ROUTING MACHINE --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <!-- Leaflet Locate CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>

    <!-- Leaflet Locate CSS -->

    <link rel="stylesheet" href="{{ asset('css/poto.css') }}" />
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @include('utama.partials.navbar2')
    <div class="container-xl">
        @yield('leaflet')
        @yield('list')
    </div>
    {{-- Leaflet --}}


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.81.0/dist/L.Control.Locate.min.js" charset="utf-8">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.6.0/Control.FullScreen.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.6.0/Control.FullScreen.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.6.0/Control.FullScreen.min.js"></script>
    <script src="https://rawgit.com/mapshakers/leaflet-icon-pulse/master/src/L.Icon.Pulse.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/mapshakers/leaflet-icon-pulse/master/src/L.Icon.Pulse.css" />
    <script src="https://cdn.jsdelivr.net/npm/@drustack/leaflet.resetview/dist/L.Control.ResetView.min.js"></script>

    {{-- MARKER --}}
    <script src="{{ asset('js/leaflet-color-markers.js') }}"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- routing --}}
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    {{-- Image Modal --}}
    <script>
        $('#imageModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var image = button.data('image') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('#modalImage').attr('src', image)
        })
    </script>

</body>

</html>
