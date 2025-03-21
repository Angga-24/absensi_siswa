<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function tampilLogin()
    {
        return view('login', [
            'menu' => 'login',
            'title' => 'Login Pengguna'
        ]);
    }

    function submitLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $nama_pengguna = $user->username; // Default: username jika tidak ditemukan di guru/siswa

            // Cek apakah user adalah guru berdasarkan username
            $guru = Guru::where('username', $user->username)->first();
            if ($guru) {
                $nama_pengguna = $guru->nama;
            } else {
                // Jika bukan guru, cek di tabel siswa
                $siswa = Siswa::where('username', $user->username)->first();
                if ($siswa) {
                    $nama_pengguna = $siswa->nama;
                }
            }

            // Simpan nama pengguna di session
            session(['nama_pengguna' => $nama_pengguna]);

            // Redirect sesuai level user
            if ($user->level === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($guru) {
                return redirect()->route('dashboard.guru');
            } elseif ($siswa) {
                return redirect()->route('dashboard.siswa');
            }
        }

        return redirect()->back()->with('error', 'Username atau Password Salah');
    }



    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
