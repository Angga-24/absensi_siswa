@extends('template-admin.layout')
@section('title', 'Data jurusan')
@section('css')
<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')
<a href="{{route('jurusan.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Tambah data jurusan</a>


<div class="card">
    <h5 class="card-header">Management Data jurusan</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kepala Jurusan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($jurusan as $ds)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ds->nama}}</td>
                    <td>{{$ds->guru->nama}}</td>
                    <td>
                        <a href="{{ route('jurusan.show', $ds->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('jurusan.edit', $ds->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<br>
<a href="{{route('local.index')}}" class="btn btn-primary btn-custom-width mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>

@endsection