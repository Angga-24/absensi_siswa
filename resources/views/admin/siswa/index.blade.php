@extends('template-admin.layout')
@section('title', 'Data Siswa')

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
                    <td>Albert Cook</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection