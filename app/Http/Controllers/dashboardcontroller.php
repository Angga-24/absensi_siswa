<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\local;
use App\Models\siswa;
use App\Models\jurusan;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboard()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = local::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        return view('admin.dashboard', [
            'menu' => 'dashboard.admin',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLocal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan
        ]);
    }

}