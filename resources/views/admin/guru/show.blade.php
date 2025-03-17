@extends('template-admin.layout')
@section('title', 'Lihat Data ' . $guru->nama)
@section('konten')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data {{$guru->nama}}</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" value="{{$guru->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nip">Nip</label>
                    <input type="number" class="form-control" value="{{$guru->nip}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" value="{{$guru->username}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nohp">No Handphone</label>
                    <input type="date" class="form-control" value="{{$guru->nohp}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <input type="text" class="form-control" value="{{$guru->alamat}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="mata_pelajaran">Konsentrasi Keahlian</label>
                    <input type="text" class="form-control" value="{{$guru->mata_pelajaran}}" disabled>
                </div>

                <a href="{{ route('guru.index') }}">
                    <button type="button" class="btn btn-primary">Kembali</button>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection