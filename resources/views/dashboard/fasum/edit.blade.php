@extends('dashboard.layouts.main')

@section('container')
    <!-- Page Heading -->
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="text-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EDIT<br> <b>{{ $title }}</b></h1>
    </div>

    <div class="container">
        <form method="post" action="/dashboard/fasum/{{ $fasum->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row g-2 mb-3">
                <!-- Kolom untuk Nama Fasilitas Umum -->
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama', $fasum->nama) }}">
                        <label for="nama"><b>Nama Fasilitas Umum</b></label>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Kolom untuk Pilih Kategori -->
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id">
                            <option value="" selected disabled></option>
                            @foreach ($categories as $category)
                                @if (old('category_id', $fasum->category_id) == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="category_id"><b>Pilih Kategori</b></label>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <!-- Baris kedua: Alamat -->
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" value="{{ old('alamat', $fasum->alamat) }}">
                        <label for="alamat"><b>Alamat</b></label>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select @error('tipe') is-invalid @enderror" id="tipe" name="tipe">
                            <option value="" selected disabled></option>
                            <option value="A" {{ old('tipe', $fasum->tipe) == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('tipe', $fasum->tipe) == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ old('tipe', $fasum->tipe) == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ old('tipe', $fasum->tipe) == 'D' ? 'selected' : '' }}>D</option>
                            <option value="I" {{ old('tipe', $fasum->tipe) == 'I' ? 'selected' : '' }}>I</option>
                            <option value="II" {{ old('tipe', $fasum->tipe) == 'II' ? 'selected' : '' }}>II</option>
                            <option value="III" {{ old('tipe', $fasum->tipe) == 'III' ? 'selected' : '' }}>III</option>
                        </select>
                        <label for="tipe"><b>Pilih Tipe</b></label>
                        @error('tipe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Baris ketiga: Pilih Kelurahan dan Pilih Kecamatan -->
            <div class="row g-2 mb-3">
                <!-- Kolom untuk Pilih Kelurahan -->
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select @error('kelurahan_id') is-invalid @enderror" id="kelurahan_id"
                            name="kelurahan_id">
                            <option value="" selected disabled></option>
                            @foreach ($kelurahans as $kelurahan)
                                @if (old('kelurahan_id', $fasum->kelurahan_id) == $kelurahan->id)
                                    <option value="{{ $kelurahan->id }}" selected>{{ $kelurahan->nama }}</option>
                                @else
                                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="kelurahan_id"><b>Pilih Kelurahan</b></label>
                        @error('kelurahan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Kolom untuk Pilih Kecamatan -->
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select @error('kecamatan_id') is-invalid @enderror" id="kecamatan_id"
                            name="kecamatan_id">
                            <option value="" selected disabled></option>
                            @foreach ($kecamatans as $kecamatan)
                                @if (old('kecamatan_id', $fasum->kelurahan->kecamatan_id) == $kecamatan->id)
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

            <!-- Baris keempat: Latitude dan Longitude -->
            <div class="row g-2 mb-3">
                <!-- Kolom untuk Latitude -->
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('lat') is-invalid @enderror" id="lat"
                            name="lat" value="{{ old('lat', $fasum->lat) }}">
                        <label for="lat"><b>Latitude</b></label>
                        @error('lat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Kolom untuk Longitude -->
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('lng') is-invalid @enderror" id="lng"
                            name="lng" value="{{ old('lng', $fasum->lng) }}">
                        <label for="lng"><b>Longitude</b></label>
                        @error('lng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Baris kelima: Waktu Pelayanan -->
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('pelayanan') is-invalid @enderror" id="pelayanan"
                            name="pelayanan" value="{{ old('pelayanan', $fasum->pelayanan) }}">
                        <label for="pelayanan"><b>Waktu Pelayanan</b></label>
                        @error('pelayanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('web') is-invalid @enderror" id="web"
                            name="web" value="{{ old('web', $fasum->web) }}">
                        <label for="web"><b>Alamat Web/Nomor</b></label>
                        @error('web')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Baris keenam: Telepon -->
            <div class="mb-3">
                <label for="telpon" class="form-label"><b>Nomor Telepon</b></label>
                <textarea class="form-control @error('telpon') is-invalid @enderror" id="telpon" name="telpon" rows="3">{{ old('telpon', $fasum->telpon) }}</textarea>
                @error('telpon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Baris keenam: Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                    rows="3">{{ old('deskripsi', $fasum->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <!-- Tombol Submit -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </div>
        </form>
    </div>
@endsection
