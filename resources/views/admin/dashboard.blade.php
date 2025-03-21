@extends('template-admin.layout')
@section('title', 'Halaman Index')

@section('konten')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Total Siswa</span>
                                <h3 class="card-title mb-2">{{ $jumlahSiswa}}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> jumlah siswa yang terdaftar </small>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
                                    </div>
                                </div>
                                <span>Total Guru</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $jumlahGuru}}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> jumlah guru yang terdaftar </small>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
                                    </div>
                                </div>
                                <span>Total Kelas</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $jumlahLocal}}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> jumlah kelas yang tersedia </small>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->

        </div>
    </div>

</div>
<!-- / Content -->

<!-- Footer -->

@endsection