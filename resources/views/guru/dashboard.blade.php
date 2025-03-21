@extends('template-guru.layout')
@section('title', 'Dashboard')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection

@section('konten')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-lg-12 col-md-12 order-1">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="fas fa-user-check fa-2x" style="color: #33cc33;"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Total Siswa Hadir</span>
                                <h3 class="card-title mb-2">{{ $jumlahSiswaHadir }}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> Total siswa yang hadir hari ini di SMKN 1 Karang Baru</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="fas fa-user-nurse fa-2x" style="color: orange;"></i>
                                    </div>
                                </div>
                                <span>Total Siswa Sakit</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $jumlahSiswaSakit }}</h3>
                                <small class="text-warning fw-semibold"><i class="bx bx-up-arrow-alt"></i> Total siswa yang sakit hari ini di SMKN 1 Karang Baru</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="fas fa-user-slash fa-2x" style="color: red;"></i>
                                    </div>
                                </div>
                                <span>Total Siswa Alpa</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $jumlahSiswaAlpa }}</h3>
                                <small class="text-danger fw-semibold"><i class="bx bx-up-arrow-alt"></i> Total siswa yang alpa hari ini di SMKN 1 Karang Baru</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="fas fa-user-shield fa-2x" style="color: #3333cc;"></i>
                                    </div>
                                </div>
                                <span>Total Siswa Izin</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $jumlahSiswaIzin }}</h3>
                                <small class="text-primary fw-semibold"><i class="bx bx-up-arrow-alt"></i> Total siswa yang izin hari ini di SMKN 1 Karang Baru</small>
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