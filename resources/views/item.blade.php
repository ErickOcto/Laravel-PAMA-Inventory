@extends('layout')

@section('header')
Karyawan
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar barang
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori Barang</th>
                            <th>Jumlah dipinjam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->category }}</th>
                            <th>{{ $item->value }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
