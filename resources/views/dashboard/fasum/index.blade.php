@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('succes') }}
        </div>
    @endif
    <!-- Page Heading -->
    <div class="text-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DETAIL DATA</h1>
    </div>

    <!-- Vertical Table Layout -->
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row"><b>Nama</b></th>
                <td>{{ $data->nama }}</td>
            </tr>
            <tr>
                <th scope="row"><b>Alamat</b></th>
                <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
                <th scope="row"><b>Kelurahan</b></th>
                <td>{{ $data->Kelurahan->nama }}</td>
            </tr>
            <tr>
                <th scope="row"><b>Kecamatan</b></th>
                <td>{{ $data->kelurahan->kecamatan->nama }}</td>
            </tr>
            <tr>
                <th scope="row"><b>Deskripsi</b></th>
                <td>{{ $data->deskripsi }}</td>
            </tr>
            <tr>
                <th scope="row"><b>Lat</b></th>
                <td>{{ $data->lat }}</td>
            </tr>
            <tr>
                <th scope="row"><b>Lng</b></th>
                <td>{{ $data->lng }}</td>
            </tr>
            <tr>
                <th scope="row"><b>Jam</b></th>
                <td>{{ $data->pelayanan }}</td>
            </tr>
        </tbody>
    </table>

    @if ($data->images)
        @if (count($data->images) > 1)
            @foreach ($data->images as $index => $image)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $image) }}" class="card-img-top img-fluid zoom"
                                    alt="..." data-toggle="modal" data-target="#imageModal">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <img src="{{ asset('storage/' . $data->images[0]) }}" class="img-fluid" alt="...">
        @endif
    @else
        <p>No images available.</p>
    @endif


@endsection
