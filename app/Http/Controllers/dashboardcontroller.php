<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\local;
use App\Models\siswa;
use App\Models\jurusan;
use App\Models\mengabsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller
{
    public function dashboard()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = local::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan
        $today = now()->toDateString(); // Mendapatkan tanggal hari ini

        $jumlahSiswaHadirHariIni = siswa::where('status', 'hadir')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaSakit = siswa::where('status', 'sakit')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaIzin = siswa::where('status', 'izin')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaAlpa = siswa::where('status', 'alpa')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaNull = siswa::where('status', 'null')
            ->whereDate('tanggal_absen', $today)
            ->count();


        return view('admin.dashboard', [
            'menu' => 'dashboard.admin',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLocal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan,
            'jumlahSiswaHadir' => $jumlahSiswaHadirHariIni,
            'jumlahSiswaSakit' => $jumlahSiswaSakit,
            'jumlahSiswaIzin' => $jumlahSiswaIzin,
            'jumlahSiswaAlpa' => $jumlahSiswaAlpa,
            'jumlahSiswaNull' => $jumlahSiswaNull
        ]);
    }
    public function dashboardGuru()
    {
        $today = now()->toDateString(); // Mendapatkan tanggal hari ini

        $jumlahSiswaHadirHariIni = siswa::where('status', 'hadir')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaSakit = siswa::where('status', 'sakit')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaIzin= siswa::where('status', 'izin')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaAlpa = siswa::where('status', 'alpa')
            ->whereDate('tanggal_absen', $today)
            ->count();
        $jumlahSiswaNull = siswa::where('status', 'null')
            ->whereDate('tanggal_absen', $today)
            ->count();

        

        return view('guru.dashboard', [
            'menu' => 'dashboard.guru',
            'jumlahSiswaHadir' => $jumlahSiswaHadirHariIni,
            'jumlahSiswaSakit' => $jumlahSiswaSakit,
            'jumlahSiswaIzin' => $jumlahSiswaIzin,
            'jumlahSiswaAlpa' => $jumlahSiswaAlpa,
            'jumlahSiswaNull' => $jumlahSiswaNull
        ]);
    }
    public function dashboardSiswa()
    {
        $siswa = siswa::where('username', Auth::user()->username)->firstOrFail();
        $rekapAbsensi = mengabsen::where('id_siswa', $siswa->id)->with('guru')->get();

        return view('siswa.dashboard', [
            'menu' => 'dashboard.siswa',
            'title' => 'Rekap Absensi ' . $siswa->nama,
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi
        ]);
    }
}