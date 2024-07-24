@extends('dashboard.layouts.main')

@section('container')
    <h1>{{ $title }}</h1>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif


    <!-- Content Row -->
    <div class="row">
        <!-- Content Row -->
        <div class="table-wrapper mb-2">
            <table class="table table-responsive-lg">
                <thead>
                    <tr>
                        <td scope="col"><b>No</b></td>
                        <td scope="col"><b>Kelurahan</b></td>
                        <td scope="col"><b>Kecamatan</b></td>
                        <td scope="col"><b>Aksi</b></td>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @foreach ($data as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kecamatan->nama }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/dashboard/{{ $url }}/{{ $item->id }}"
                                        class="btn btn-success btn-sm">
                                        <i class="bi bi-eye"></i> Read
                                    </a>

                                    <a href="/dashboard/{{ $url }}/{{ $item->id }}/edit"
                                        class="btn btn-warning btn-sm ml-1">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>

                                    <form action="{{ $url_del }}/{{ $item->id }}" method="post" class="ml-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Ingin Hapus Data?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="btn-group d-flex">
            <a class="btn btn-primary" href="{{ $url_create }}" role="button">+ Tambah Data +</a>
        </div>
    </div>
@endsection
