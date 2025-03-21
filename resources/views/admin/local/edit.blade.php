@extends('template-admin.layout')
@section('title', 'Edit Data Local')
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data Local</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('local.update', $local->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tingkat">Tingkat</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tingkat" name="tingkat" required>
                            <option disabled selected value="">Pilih Tingkat</option>
                            <option value="X" {{ $local->tingkat == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ $local->tingkat == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ $local->tingkat == 'XII' ? 'selected' : '' }}>XII</option>
                            <option value="XIII" {{ $local->tingkat == 'XIII' ? 'selected' : '' }}>XIII</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="urutan">Urutan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="urutan" name="urutan">
                            <option disabled selected value="">Pilih Urutan</option>
                            <option value="1" {{ $local->urutan == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $local->urutan == '2' ? 'selected' : '' }}>2</option>
                            <option value="" {{ $local->urutan == '' ? 'selected' : '' }}>Tidak Pakai Urutan Kelas</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kapasitas">Jumlah Siswa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas" value="{{ $local->kapasitas }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun_ajaran">Tahun Ajaran</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
                            <option disabled selected value="">Pilih Tahun Ajaran</option>
                            <option value="2023/2024" {{ $local->tahun_ajaran == '2023/2024' ? 'selected' : '' }}>2023/2024</option>
                            <option value="2024/2025" {{ $local->tahun_ajaran == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                            <option value="2025/2026" {{ $local->tahun_ajaran == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="id_guru">Guru</label>
                    <div class="col-sm-10">
                        <select name="id_guru" class="form-control" required>
                            <option disabled selected value="">Pilih Wali Kelas</option>
                            @foreach ($guru as $g)
                            <option value="{{ $g->id }}" {{ $local->id_guru == $g->id ? 'selected' : '' }} @if (in_array($g->id, $guru_terpakai) && $local->id_guru != $g->id) disabled @endif>
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
                            <option value="{{ $j->id }}" {{ $local->id_jurusan == $j->id ? 'selected' : '' }} @if (in_array($j->id, $jurusan_terpakai) && $local->id_jurusan != $j->id) disabled @endif>
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