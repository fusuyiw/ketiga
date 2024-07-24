@extends('dashboard.layouts.utama')

@section('container')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7"">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Fasilitas Umum Kota Malang</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle warna-merah"></i> RS
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle warna-oren"></i> ST
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle warna-kuning"></i> TK
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle warna-hijau"></i> Mall
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle warna-birumuda"></i> Polsek
                        </span><br>
                        <span class="mr-2">
                            <i class="fas fa-circle warna-biru"></i> Kantor
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle warna-ungu"></i> Kampus
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Rumah Sakit -->
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-merah shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Rumah Sakit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Sarana Trasnportasi -->
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-oren shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sarana Transportasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-train fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Taman Kota -->
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-kuning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Taman Kota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tkCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fan fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Mall -->
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-hijau shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Mall</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mallCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Polsek -->
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-birumuda shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Polsek</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $polsekCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-person-military-pointing fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah KP -->
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-biru shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kantor Pemerintahan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kpCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-regular fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah PT -->
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-ungu shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Perguruan Tinggi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ptCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-school fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td scope="col"><b>Nama</b></b></td>
                                <td scope="col" class="d-none d-md-table-cell"><b>Kategori</b></td>
                                <td scope="col" class="d-none d-md-table-cell"><b>Kecamatan</b></td>
                                <td scope="col" class="d-none d-md-table-cell"><b>Kelurahan</b></td>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($latlng as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td class="d-none d-md-table-cell">{{ $data->category->nama }}</td>
                                    <td class="d-none d-md-table-cell">{{ $data->kelurahan->kecamatan->nama }}</td>
                                    <td class="d-none d-md-table-cell">{{ $data->kelurahan->nama }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
