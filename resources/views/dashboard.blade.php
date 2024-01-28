@extends('layout')

@section('header')
Karyawan
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    {{-- Daftar karyawan --}}
                </h5>
            </div>
            <div class="card-body">
                <h1 class="d-flex align-items-center justify-content-center">Selamat Datang di Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between mx-5">
                        <div class="wrap">
                            <h1>{{ $countAll }}</h1>
                            <h3>Total Data</h3>
                        </div>
                        <h1>
                            <i class="bi bi-archive-fill"></i>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between mx-5">
                        <div class="wrap">
                            <h1>{{ $countBorrow }} Barang</h1>
                            <h3>Dipinjam</h3>
                        </div>
                        <h1>
                            <i class="bi bi-clock-fill"></i>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between mx-5">
                        <div class="wrap">
                            <h1>{{ $countReturn }} Barang</h1>
                            <h3>Dikembalikan</h3>
                        </div>
                        <h1>
                            <i class="bi bi-file-earmark-arrow-up-fill"></i>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    History peminjaman
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>NRP Karyawan</th>
                            <th>Nama Barang</th>
                            <th>Kategori Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $borrow)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $borrow->user_name }}</th>
                            <th>{{ $borrow->user_nrp }}</th>
                            <th>{{ $borrow->item_name }}</th>
                            <th>{{ $borrow->item_category }}</th>
                            <th>{{ $borrow->borrow_date }}</th>
                            <th>{{ $borrow->return_date ?? "Dipinjam"}}</th>
                            <th>{{ $borrow->phone }}</th>
                            <th>
                                <form action="{{ route('borrow.destroy', $borrow->id) }}" onsubmit="return confirm('Apakah anda yakin?')" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Hapus History</button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
