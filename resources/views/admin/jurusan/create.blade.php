@extends('template-admin.layout')
@section('title', 'Tambah Data Jurusan')
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data Jurusan</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('jurusan.store') }}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama Jurusan (contoh: RPL, DKV)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama jurusan" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="id_guru">Kepala Jurusan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_guru" name="id_guru" required>
                            <option disabled selected value="">Pilih Kepala Jurusan</option>
                            @foreach($guru as $g)
                             <option value="{{ $g->id }}"
                                @if (in_array($g->id, $guru_terpakai)) disabled @endif>
                                {{ $g->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('jurusan.index') }}">
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