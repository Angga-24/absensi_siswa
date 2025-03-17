@extends('template-admin.layout')
@section('title', 'Lihat Data ' . $siswa->nama)
@section('konten')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data {{$siswa->nama}}</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" value="{{$siswa->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nisn">Nisn</label>
                    <input type="number" class="form-control" value="{{$siswa->nisn}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" value="{{$siswa->username}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" value="{{$siswa->tanggal_lahir}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jk">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="{{$siswa->jk}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_local">Kelas</label>
                    <input type="text" class="form-control" value="{{$siswa->local->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <input type="text" class="form-control" value="{{$siswa->status}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <input type="text" class="form-control" value="{{$siswa->alamat}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama_wm">Nama WaliMurid</label>
                    <input type="text" class="form-control" value="{{$siswa->nama_wm}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nohp_wm">No Hp WaliMurid</label>
                    <input type="text" class="form-control" value="{{$siswa->nohp_wm}}" disabled>
                </div>

                <a href="{{ route('siswa.index') }}">
                    <button type="button" class="btn btn-primary">Kembali</button>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection