@extends('template-admin.layout')
@section('title', 'Tambah Data user')
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data Siswa</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                
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

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('user.index') }}">
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