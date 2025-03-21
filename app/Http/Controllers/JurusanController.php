<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\guru;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = jurusan::all();
        return view('admin.jurusan.index', [
            'menu' => 'jurusan',
            'title' => 'Data jurusan',
            'jurusan' => $jurusan
        ]);
    }

    public function create()
    {
        $guru = Guru::all();
        $guru_terpakai = jurusan::pluck('id_guru')->toArray();

        return view('admin.jurusan.create', [
            'menu' => 'jurusan',
            'title' => 'Tambah Data jurusan',
            'guru' => $guru,
            'guru_terpakai' => $guru_terpakai
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'id_guru' => 'required',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'id_guru.required' => 'Kepala Jurusan Harus Dipilih',
        ]);

        $jurusan  = new jurusan;
        $jurusan->nama = $validasi['nama'];
        $jurusan->id_guru = $validasi['id_guru'];
        $jurusan->save();

        return redirect(route('jurusan.index'));
    }

    public function edit($id)
    {
        $jurusan = jurusan::findOrFail($id);
        $guru = Guru::all();
        $guru_terpakai = jurusan::pluck('id_guru')->toArray();

        return view('admin.jurusan.edit', [
            'menu' => 'jurusan',
            'title' => 'Edit Data jurusan',
            'jurusan' => $jurusan,
            'guru' => $guru,
            'guru_terpakai' => $guru_terpakai
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'nullable',
            'id_guru' => 'nullable',
        ]);

        $jurusan = jurusan::findOrFail($id);
        $jurusan->nama = $validasi['nama'] ?? $jurusan->nama;
        $jurusan->id_guru = $validasi['id_guru'] ?? $jurusan->id_guru;
        $jurusan->save();

        return redirect(route('jurusan.index'));
    }

    public function show($id)
    {
        $jurusan = jurusan::findOrFail($id);
        return view('admin.jurusan.show', [
            'menu' => 'jurusan',
            'title' => 'Detail Data jurusan',
            'jurusan' => $jurusan
        ]);
    }
}