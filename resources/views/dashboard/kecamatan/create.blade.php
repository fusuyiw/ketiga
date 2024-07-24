@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('succes'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('succes') }}
        </div>
    @endif
    <!-- Page Heading -->
    <div class="text-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CREATE<br> <b>{{ $title }}</b></span></h1>
    </div>

    <div class="container">
        <form method="post" action="/dashboard/kecamatan" enctype="multipart/form-data">
            @csrf
            <!-- Kolom untuk Nama-->
            <div class="mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}">
                    <label for="nama"><b>Nama Kecamatan</b></label>
                </div>
            </div>
            {{-- Upload File --}}
            <div class="mb-3">
                <label for="geojson" class="form-label">Unggah File GeoJson Kecamatan</label>
                <input class="form-control @error('geojson') is-invalid @enderror" type="file" id="geojson"
                    name="geojson">
            </div>

            <!-- Tombol Submit -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
