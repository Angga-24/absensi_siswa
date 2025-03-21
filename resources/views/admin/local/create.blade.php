@extends('template-admin.layout')
@section('title', 'Tambah Data Local')
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Data Local</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('local.store') }}">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tingkat">Tingkat</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tingkat" name="tingkat" required>
                            <option disabled selected value="">Pilih Tingkat</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                            <option value="XIII">XIII</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="urutan">Urutan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="urutan" name="urutan">
                            <option disabled selected value="">Pilih Urutan</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="">Tidak Pakai Urutan Kelas</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kapasitas">Jumlah Siswa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun_ajaran">Tahun Ajaran</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
                            <option disabled selected value="">Pilih Tahun Ajaran</option>
                            <option value="2023/2024">2023/2024</option>
                            <option value="2024/2025">2024/2025</option>
                            <option value="2025/2026">2025/2026</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="id_guru">Guru</label>
                    <div class="col-sm-10">
                        <select name="id_guru" class="form-control" required>
                            <option disabled selected value="">Pilih Wali Kelas</option>
                            @foreach ($guru as $g)
                            <option value="{{ $g->id }}" @if (in_array($g->id, $guru_terpakai)) disabled @endif>
                                {{ $g->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="id_jurusan">Jurusan</label>
                    <div class="col-sm-10">
                        <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                            <option disabled selected value="">Pilih Jurusan</option>
                            @foreach($jurusan as $j)
                            <option value="{{ $j->id }}" @if (in_array($j->id, $jurusan_terpakai)) disabled @endif>
                                {{ $j->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('local.index') }}">
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