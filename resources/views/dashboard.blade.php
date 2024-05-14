@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="container px-1 py-1 ">
        <div class="bg-info p-3 rounded">
            <div class="d-flex justify-content-between text-center mb-2 p-3">
                <div class="">
                    <h2>List Product</h2>
                </div>
            </div>

            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @php $nomor = 1; @endphp
                    @foreach ($users as $u)
                        <tr>
                            <th scope="row">{{ $nomor }}.</th>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->gender }}</td>
                            <td>{{ $u->age }}</td>
                            <td>{{ $u->birth }}</td>
                            <td>{{ $u->address }}</td>
                        </tr>
                        @php $nomor++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
