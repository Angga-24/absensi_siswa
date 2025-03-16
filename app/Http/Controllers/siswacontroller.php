<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\local;
use App\Models\siswa;
use Illuminate\Http\Request;

class siswacontroller extends Controller
{
    public function index()
    {
        $datasiswa = siswa::all();
        return view('admin.siswa.index', [
            'menu' => 'siswa',
            'title' => 'Data Siswa',
            'datasiswa' => $datasiswa
        ]);
    }

    public function create()
    {
        $kelas = local::all();
        return view('admin.siswa.create', [
            'menu' => 'siswa',
            'title' => 'Tambah Data Siswa',
            'kelas' => $kelas
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'username' => 'required',
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'nama_wm' => 'required',
            'nohp_wm' => 'required',
            'id_local' => 'required',
            'id_user' => 'nullable',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nisn.required' => 'NISN Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'nama_wm.required' => 'Nama WaliMurid Harus Diisi',
            'nohp_wm.required' => 'No HP WaliMurid Harus Diisi',
            'id_local.required' => 'Kelas Harus Diisi',
        ]);

        $user = new User();
        $user->username = $validasi['username'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'siswa'; // Default level siswa
        $user->save();

        $siswa  = new siswa;
        $siswa->nama = $validasi['nama'];
        $siswa->nisn = $validasi['nisn'];
        $siswa->username = $validasi['username'];
        $siswa->password = bcrypt($validasi['password']);
        $siswa->tanggal_lahir = $validasi['tanggal_lahir'];
        $siswa->jk = $validasi['jk'];
        $siswa->alamat = $validasi['alamat'];
        $siswa->nama_wm = $validasi['nama_wm'];
        $siswa->nohp_wm = $validasi['nohp_wm'];
        $siswa->id_local = $validasi['id_local'];
        $siswa->id_user = $user->id;
        $siswa->save();

        return redirect(route('siswa.index'));
    }
}
