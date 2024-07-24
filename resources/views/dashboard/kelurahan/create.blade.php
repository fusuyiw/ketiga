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
        <form method="post" action="/dashboard/kelurahan" enctype="multipart/form-data">
            @csrf
            <div class="row g-2 mb-3">
                <!-- Kolom untuk Nama-->
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}">
                        <label for="nama"><b>Nama Kelurahan</b></label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select @error('kecamatan_id') is-invalid @enderror" id="kecamatan_id"
                            name="kecamatan_id">
                            <option value="" selected disabled></option>
                            @foreach ($kecamatans as $kecamatan)
                                @if (old('kecamatan_id') == $kecamatan->id)
                                    <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama }}</option>
                                @else
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="kecamatan_id"><b>Pilih Kecamatan</b></label>
                        @error('kecamatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <!-- Tombol Submit -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
