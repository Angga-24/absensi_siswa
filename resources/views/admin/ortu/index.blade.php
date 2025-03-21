@extends('template-admin.layout')
@section('title', 'Data Orang Tua')
@section('css')
<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')

<div class="card">
    <h5 class="card-header">Management Data Orang Tua</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nama Wali Murid</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($ortu as $dg)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dg->nama}}</td>
                    <td>{{$dg->local->nama}}</td>
                    <td>{{$dg->nama_wm}}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('ortu.show', $dg->id) }}" class='btn btn-outline-primary btn-sm'><i class='fas fa-eye' title="show"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection