@extends('template-admin.layout')
@section('title', 'Data Orang Tua')
@section('css')
<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('konten')

<div class="card">
    <h5 class="card-header">Management Data Pengguna</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($user as $dg)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dg->username}}</td>
                    <td>{{$dg->level}}</td>
                  
                    
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection