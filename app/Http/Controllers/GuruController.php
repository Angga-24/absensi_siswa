<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use App\Models\local;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $dataguru = guru::all();
        return view('admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data guru',
            'dataguru' => $dataguru
        ]);
    }

    public function create()
    {
        $kelas = local::all();
        return view('admin.guru.create', [
            'menu' => 'guru',
            'title' => 'Tambah Data guru',
            'kelas' => $kelas
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'mata_pelajaran' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',

        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nohp.required' => 'Nohp Harus Diisi',
            'mata_pelajaran.required' => 'Mata Pelajaran Harus Diisi',
            'nip.required' => 'Nip Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
        ]);

        $user = new User();
        $user->username = $validasi['username'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'guru'; // Default level guru
        $user->save();

        $guru  = new guru;
        $guru->nama = $validasi['nama'];
        $guru->nohp = $validasi['nohp'];
        $guru->mata_pelajaran = $validasi['mata_pelajaran'];
        $guru->nip = $validasi['nip'];
        $guru->username = $validasi['username'];
        $guru->password = bcrypt($validasi['password']);
        $guru->alamat = $validasi['alamat'];
        $guru->id_level = $user->id;
        $guru->save();

        return redirect(route('guru.index'));
    }

    public function edit($id)
    {
        $guru = guru::findOrFail($id); // Mengambil satu instance guru berdasarkan ID
        return view('admin.guru.edit', [
            'menu' => 'guru',
            'title' => 'Edit Data guru',
            'guru' => $guru
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'nullable',
            'nohp' => 'nullable',
            'mata_pelajaran' => 'nullable',
            'nip' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'alamat' => 'nullable',
        ]);

        $guru = guru::findOrFail($id);
        $guru->nama = $validasi['nama'] ?? $guru->nama;
        $guru->nohp = $validasi['nohp'] ?? $guru->nohp;
        $guru->mata_pelajaran = $validasi['mata_pelajaran'] ?? $guru->mata_pelajaran;
        $guru->nip = $validasi['nip'] ?? $guru->nip;
        $guru->username = $validasi['username'] ?? $guru->username;
        if ($request->filled('password')) {
            $guru->password = bcrypt($validasi['password']);
        }
        $guru->alamat = $validasi['alamat'] ?? $guru->alamat;
        $guru->save();

        $user = User::where('username', $guru->username)->first();
        if ($user) {
            $user->username = $validasi['username'] ?? $user->username;
            if ($request->filled('password')) {
                $user->password = bcrypt($validasi['password']);
            }
            $user->save();
        }

        return redirect(route('guru.index'));
    }

    public function show($id)
    {
        $guru = guru::find($id);
        return view('admin.guru.show', [
            'menu' => 'guru',
            'title' => 'Detail Data guru',
            'guru' => $guru
        ]);
    }

    public function destroy($id)
    {
        $guru = guru::find($id);
        $guru->delete();
        return redirect(route('guru.index'));
    }
}
