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
    $siswa->status = 'null';
    $siswa->id_local = $validasi['id_local'];
    $siswa->id_user = $user->id;
    $siswa->save();

    return redirect(route('siswa.index'));
}

    public function edit($id)
    {
        $siswa = siswa::with('local')->find($id);
        $kelas = local::all();
        return view('admin.siswa.edit', [
            'menu' => 'siswa',
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'nullable',
            'nisn' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'jk' => 'nullable',
            'alamat' => 'nullable',
            'nama_wm' => 'nullable',
            'nohp_wm' => 'nullable',
            'status' => 'nullable',
            'id_local' => 'nullable',
        ]);

        $siswa = Siswa::findOrFail($id);

        // Update data siswa
        $siswa->nama = $validasi['nama'] ?? $siswa->nama;
        $siswa->nisn = $validasi['nisn'] ?? $siswa->nisn;
        $siswa->username = $validasi['username'] ?? $siswa->username;
        if ($request->filled('password')) {
            $siswa->password = bcrypt($validasi['password']);
        }
        $siswa->tanggal_lahir = $validasi['tanggal_lahir'] ?? $siswa->tanggal_lahir;
        $siswa->jk = $validasi['jk'] ?? $siswa->jk;
        $siswa->alamat = $validasi['alamat'] ?? $siswa->alamat;
        $siswa->nama_wm = $validasi['nama_wm'] ?? $siswa->nama_wm;
        $siswa->nohp_wm = $validasi['nohp_wm'] ?? $siswa->nohp_wm;
        $siswa->status = $validasi['status'] ?? $siswa->status;
        $siswa->id_local = $validasi['id_local'] ?? $siswa->id_local;

        $siswa->save();

        $user = User::findOrFail($siswa->id_user);
        $user->username = $validasi['username'] ?? $user->username;
        if ($request->filled('password')) {
            $user->password = bcrypt($validasi['password']);
        }

        $user->save();

        return redirect(route('siswa.index'));
    }

    public function show($id)
    {
        $siswa = siswa::find($id);
        return view('admin.siswa.show', [
            'menu' => 'siswa',
            'title' => 'Detail Data Siswa',
            'siswa' => $siswa
        ]);
    }
}
