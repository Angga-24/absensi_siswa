@extends('template-admin.layout')
@section('title', 'Data User')
@section('css')
<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')
<a href="{{route('user.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Tambah Data User</a>

<div class="card">
    <h5 class="card-header">Management Data Pengguna</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($user as $dg)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dg->username}}</td>
                    <td>{{$dg->level}}</td>
                    <td>
                        <form action="{{ route('user.destroy', $dg->id) }}" method="POST" style="display:inline;">
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