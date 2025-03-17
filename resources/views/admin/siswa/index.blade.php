@extends('template-admin.layout')
@section('title', 'Data Siswa')
@section('css')
    <!-- Other head content -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')
<a href="{{route('siswa.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Tambah Data Siswa</a>

<div class="card">
    <h5 class="card-header">Management Data Siswa</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nisn</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($datasiswa as $ds)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ds->nama}}</td>
                    <td>{{$ds->nisn}}</td>
                    <td>{{$ds->local->nama}}</td>
                    <td>
                        @if($ds->status == 'hadir')
                        <span class="badge bg-label-success me-1">Hadir</span>
                        @elseif($ds->status == 'sakit')
                        <span class="badge bg-label-warning me-1">Sakit</span>
                        @elseif($ds->status == 'izin')
                        <span class="badge bg-label-info me-1">Izin</span>
                        @elseif($ds->status == 'alpa')
                        <span class="badge bg-label-danger me-1">Alpa</span>
                        @elseif($ds->status == 'null')
                        <span class="badge bg-label-primary me-1">Null</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('siswa.show', $ds->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('siswa.edit', $ds->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('siswa.destroy', $ds->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection