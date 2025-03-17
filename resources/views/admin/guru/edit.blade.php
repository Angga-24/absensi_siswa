
@extends('template-admin.layout')
@section('title', 'Mengedit Data ' . $guru->nama)
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data {{$guru->nama}}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guru.update', $guru->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="{{$guru->nama}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nip">Nip</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" value="{{$guru->nip}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="username">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="{{$guru->username}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Biarkan kosong jika Tidak ingin mengganti Password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nohp">No Handphone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nohp" name="nohp" value="{{$guru->nohp}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat">{{$guru->alamat}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="mata_pelajaran">Konsentrasi Keahlian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="{{$guru->mata_pelajaran}}">
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('guru.index') }}">
                            <button type="button" class="btn btn-primary">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection