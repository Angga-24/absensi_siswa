@extends('template-admin.layout')
@section('title', 'Data local')
@section('css')
<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')
<a href="{{route('local.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Tambah data local</a>

<a href="{{route('jurusan.index')}}" class="btn btn-primary btn-custom-width mb-2"><i class="fas fa-graduation-cap"></i> Jurusan</a>

<div class="card">
    <h5 class="card-header">Management Data local</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kapasitas</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($local as $ds)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ds->nama}}</td>
                    <td>{{$ds->kapasitas}}</td>
                    <td>
                        <a href="{{ route('local.show', $ds->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('local.edit', $ds->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('local.destroy', $ds->id) }}" method="POST" style="display:inline;">
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