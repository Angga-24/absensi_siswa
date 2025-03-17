@extends('template-admin.layout')
@section('title', 'Data Guru')
@section('css')
    <!-- Other head content -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')
<a href="{{route('guru.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Tambah data guru</a>

<div class="card">
    <h5 class="card-header">Management Data Guru</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nip</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($dataguru as $ds)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ds->nama}}</td>
                    <td>{{$ds->nip}}</td>
                    <td>
                        <a href="{{ route('guru.show', $ds->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('guru.edit', $ds->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('guru.destroy', $ds->id) }}" method="POST" style="display:inline;">
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