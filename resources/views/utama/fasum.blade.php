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
                        <li>Fasilitas Umum</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary text-center">Fasilitas Umum di Kota Malang</h4>
                </div>
                <div class="card-body">
                    @if (count($facilities) > 0)
                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col" class="d-none d-md-table-cell">Kecamatan</th>
                                        <th scope="col" class="d-none d-md-table-cell">Kategori</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facilities as $category_id => $categoryFacilities)
                                        @foreach ($categoryFacilities as $facility)
                                            <tr>
                                                <td>{{ $facility->nama }}</td>
                                                <td>{{ $facility->alamat }}</td>
                                                <td class="d-none d-md-table-cell">
                                                    {{ $facility->kelurahan->kecamatan->nama }}</td>
                                                <td class="d-none d-md-table-cell">
                                                    @php
                                                        switch ($facility->category_id) {
                                                            case 1:
                                                                $categoryUrl = url('/Sarana-Transportasi');
                                                                break;
                                                            case 2:
                                                                $categoryUrl = url('/Rumah-Sakit');
                                                                break;
                                                            case 3:
                                                                $categoryUrl = url('/Taman-Kota');
                                                                break;
                                                            case 4:
                                                                $categoryUrl = url('/Mall');
                                                                break;
                                                            case 5:
                                                                $categoryUrl = url('/Polsek');
                                                                break;
                                                            case 6:
                                                                $categoryUrl = url('/Kantor-Pemerintahan');
                                                                break;
                                                            case 7:
                                                                $categoryUrl = url('/Perguruan-Tinggi');
                                                                break;
                                                            default:
                                                                $categoryUrl = '#';
                                                        }
                                                    @endphp
                                                    <a href='{{ $categoryUrl }}' class="text-decoration-none">
                                                        {{ $facility->category->nama }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @php
                                                        switch ($facility->category_id) {
                                                            case 1:
                                                                $url = url("/Sarana-Transportasi/{$facility->id}");
                                                                break;
                                                            case 2:
                                                                $url = url("/Rumah-Sakit/{$facility->id}");
                                                                break;
                                                            case 3:
                                                                $url = url("/Taman-Kota/{$facility->id}");
                                                                break;
                                                            case 4:
                                                                $url = url("/Mall/{$facility->id}");
                                                                break;
                                                            case 5:
                                                                $url = url("/Polsek/{$facility->id}");
                                                                break;
                                                            case 6:
                                                                $url = url("/Kantor-Pemerintahan/{$facility->id}");
                                                                break;
                                                            case 7:
                                                                $url = url("/Perguruan-Tinggi/{$facility->id}");
                                                                break;
                                                            default:
                                                                $url = '#';
                                                        }
                                                    @endphp
                                                    <a href='{{ $url }}'>
                                                        <button type="button"
                                                            class="btn btn-outline-primary">Selengkapnya</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center fs-4">Data Tidak Ditemukan</p>
                    @endif
                </div>
            </div>
        </div>

    </main>


@endsection
