@extends('template-admin.layout')
@section('title', 'Lihat Data ' . $ortu->nama)
@section('konten')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data {{$ortu->nama}}</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" value="{{$ortu->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_local">Kelas</label>
                    <input type="text" class="form-control" value="{{$ortu->local->nama}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <input type="text" class="form-control" value="{{$ortu->alamat}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama_wm">Nama WaliMurid</label>
                    <input type="text" class="form-control" value="{{$ortu->nama_wm}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nohp_wm">No Hp WaliMurid</label>
                    <input type="text" class="form-control" value="{{$ortu->nohp_wm}}" disabled>
                </div>

                <a href="{{ route('ortu.index') }}">
                    <button type="button" class="btn btn-primary">Kembali</button>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection