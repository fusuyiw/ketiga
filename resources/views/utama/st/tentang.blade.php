@extends('utama.layouts.main')
@section('container')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Fasilitas Umum</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="/fasum">Fasilitas Umum</a></li>
                        <li>Sarana Transportasi</li>
                    </ol>
                </div>
            </div>
        </section>


        @if (count($latlng) > 0)
            <section class="inner-page">
                <div class="container">
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary text-center">{{ $title }} di Kota Malang
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ $title }}</th>
                                            <th scope="col" class="d-none d-md-table-cell">Alamat</th>
                                            <th scope="col" class="d-none d-md-table-cell">Kelurahan</th>
                                            <th scope="col" class="d-none d-md-table-cell">Kecamatan</th>
                                            <th scope="col">Tipe</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($latlng as $data)
                                            <tr>
                                                <td>{{ $data->nama }}</td>
                                                <td class="d-none d-md-table-cell">{{ $data->alamat }}</td>
                                                <td class="d-none d-md-table-cell">{{ $data->kelurahan->nama }}</td>
                                                <td class="d-none d-md-table-cell">{{ $data->kelurahan->kecamatan->nama }}
                                                </td>
                                                <td>{{ $data->tipe }}</td>
                                                <td><a href='/{{ $url }}/{{ $data->id }}'>
                                                        <button type="button"
                                                            class="btn btn-outline-primary">Selengkapnya</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <p class="text-center fs-4">Data Tidak Ditemukan</p>
        @endif
        </table>
        </div>
        </div>
        </div>
    </main>
@endsection
