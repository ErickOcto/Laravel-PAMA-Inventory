@extends('layout')

@section('header')
Karyawan
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar peminjaman
                </h5>
                <a href="{{ route('borrow.create') }}" class="btn btn-primary">Tambah Data Pinjaman</a>
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
                                <form action="{{ route('updateStatus', $borrow->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                                <a href="{{ route('borrow.edit', $borrow->id) }}">Edit</a>
                                <form action="{{ route('borrow.destroy', $borrow->id) }}" onsubmit="return confirm('Apakah anda yakin?')" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Hapus</button>
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
