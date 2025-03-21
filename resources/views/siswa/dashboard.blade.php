
@extends('template-siswa.layout')
@section('title', $title)
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Rekap Absensi {{$siswa->nama}}</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        
                        <th>Status</th>
                        <th>Guru yang Mengabsen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapAbsensi as $rekap)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$rekap->tanggal}}</td>
                        <td>{{$rekap->jam_masuk}}</td>
                        
                        <td>
                            @if($rekap->status == 'hadir')
                            <span class="badge bg-label-success me-1">Hadir</span>
                            @elseif($rekap->status == 'sakit')
                            <span class="badge bg-label-warning me-1">Sakit</span>
                            @elseif($rekap->status == 'izin')
                            <span class="badge bg-label-info me-1">Izin</span>
                            @elseif($rekap->status == 'alpa')
                            <span class="badge bg-label-danger me-1">Alpa</span>
                            @endif
                        </td>
                        <td>{{$rekap->guru->nama}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection