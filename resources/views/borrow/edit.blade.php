@extends('layout')

@section('header')
Buat peminjaman
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-8">
                <form class="card" action="{{ route('borrow.update', $borrow->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Form tambah Karyawan</h4>

                    </div>
                    <div class="card-body">
                        <div class="row gy-1">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Nama Karyawan</label
                                  >
                                  <!-- Elemen input untuk menampilkan nama pengguna -->
                                  <input type="text" id="userName" value="{{ old('userName', $userName) }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >NRP</label
                                  >
                                    <fieldset class="form-group">
                                        <select id="mySelect2" class="form-select" name="user_id"  required>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $borrow->user_id ? 'selected' : '' }}>{{ $user->nrp }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >No Telp</label
                                  >
                                  <!-- Elemen input untuk menampilkan nama pengguna -->
                                  <input type="text"  class="form-control" name="phone" value="{{ old('phone', $borrow->phone) }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >No Seri</label
                                  >
                                  <!-- Elemen input untuk menampilkan nama pengguna -->
                                  <input type="text"  class="form-control" name="series" value="{{ old('series', $borrow->series) }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Tanggal Pinjam</label
                                  >
                                  <!-- Elemen input untuk menampilkan nama pengguna -->
                                  <input type="date"  class="form-control" name="borrow_date" value="{{ old('borrow_date', $borrow->borrow_date) }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >Barang</label
                                  >
                                    <fieldset class="form-group">
                                        <select id="mySelect2" class="form-select" name="item_id"  required>
                                            @foreach ($items as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $borrow->item_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="w-full row gx-5 d-flex">
                            <div class="col-6 d-grid">
                                <a href="{{ route('borrow.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-6 d-grid">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('add-script')
<script>
    $(document).ready(function () {
        // Inisialisasi Select2 pada elemen dengan ID "mySelect2"
        $('#mySelect2').select2();

        // Mendengarkan perubahan pada elemen select dengan ID "userIdSelect"
        $('#mySelect2').change(function () {
            // Mendapatkan nilai ID yang dipilih
            var selectedUserId = $(this).val();

            // Mengirim permintaan AJAX untuk mendapatkan data nama pengguna berdasarkan ID
            $.ajax({
                url: '/getUserName/' + selectedUserId, // Gantilah dengan URL yang sesuai di aplikasi Laravel Anda
                type: 'GET',
                success: function (data) {
                    // Memperbarui nilai elemen input nama pengguna dengan ID "userName"
                    $('#userName').val(data.userName);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endpush
