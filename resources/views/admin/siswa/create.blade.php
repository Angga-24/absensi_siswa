@extends('template-admin.layout')
@section('title', 'Tambah Data Siswa')
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data Siswa</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('siswa.store') }}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nisn">Nisn</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Masukkan nisn" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="username">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis_kelamin" name="jk" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kelas">Kelas</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_local" name="id_local" required>
                            <option disabled selected value="">Pilih Kelas</option>
                            @foreach($kelas as $k)
                            <option value="{{ $k['id'] }}">{{ $k['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama_wm">Nama WaliMurid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_wm" name="nama_wm" placeholder="Masukkan nama walimurid" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nohp_wm">No Hp WaliMurid</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp_wm" name="nohp_wm" placeholder="Masukkan no hp walimurid" required>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('siswa.index') }}">
                            <button type="button" class="btn btn-primary">Kembali</button>
                        </a>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection