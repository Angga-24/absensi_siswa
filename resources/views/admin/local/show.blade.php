@extends('template-admin.layout')
@section('title', 'Lihat Data ' . $local->nama)
@section('konten')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data {{$local->nama}}</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Kelas</label>
                    <input type="text" class="form-control" value="{{$local->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="wali kelas">Wali Kelas</label>
                    <input type="text" class="form-control" value="{{$local->guru->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="kapasitas">Jumlah Siswa</label>
                    <input type="text" class="form-control" value="{{$local->kapasitas}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" value="{{$local->tahun_ajaran}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" value="{{$local->jurusan->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jurusan">Kepala Jurusan</label>
                    <input type="text" class="form-control" value="{{$local->jurusan->kepala_jurusan}}" disabled>
                </div>


                <a href="{{ route('local.index') }}">
                    <button type="button" class="btn btn-primary">Kembali</button>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection