@extends('dashboard.layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="text-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DETAIL DATA</h1>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8">
            <!-- Vertical Table Layout -->
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row"><b>Nama</b></th>
                        <td>{{ $data->nama }}</td>
                    </tr>

            </table>
        </div>
    </div>
@endsection
