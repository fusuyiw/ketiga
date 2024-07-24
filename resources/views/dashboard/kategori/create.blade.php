@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('succes') }}
        </div>
    @endif
    <!-- Page Heading -->
    <div class="text-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CREATE<br> <b>{{ $title }}</b></span></h1>
    </div>

    <div class="container">
        <form method="post" action="/dashboard/kategori">
            @csrf
            <!-- Kolom untuk Nama-->
            <div class="mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}">
                    <label for="nama"><b>Nama Kategori</b></label>
                </div>
            </div>


            <!-- Tombol Submit -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
