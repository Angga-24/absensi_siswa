<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\local;
use App\Models\jurusan;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index()
    {
        $local = Local::with('guru')->get(); // Mengambil data dengan relasi
        $jurusan = Jurusan::all();

        return view('admin.local.index', [
            'menu' => 'local',
            'title' => 'Data Kelas',
            'local' => $local,
            'jurusan' => $jurusan
        ]);
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        $guru = Guru::all();

        // Ambil ID wali kelas yang sudah digunakan
        $guru_terpakai = Local::pluck('id_guru')->toArray();

        return view('admin.local.create', [
            'menu' => 'local',
            'title' => 'Tambah Data Kelas',
            'jurusan' => $jurusan,
            'guru' => $guru,
            'guru_terpakai' => $guru_terpakai, // Kirim data guru yang sudah dipakai
            
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tingkat' => 'required',
            'urutan' => 'nullable',
            'kapasitas' => 'required',
            'tahun_ajaran' => 'required',
            'id_jurusan' => 'required',
            'id_guru' => 'required'
        ], [
            'tingkat.required' => 'Tingkat harus dipilih',
            'kapasitas.required' => 'Jumlah siswa harus dipilih',
            'tahun_ajaran.required' => 'Tahun ajaran harus dipilih',
            'id_jurusan.required' => 'Jurusan harus dipilih',
            'id_guru.required' => 'Wali kelas harus dipilih'
        ]);

        // Ambil nama jurusan berdasarkan id_jurusan
        $jurusan = Jurusan::find($validasi['id_jurusan']);

        if (!$jurusan) {
            return back()->withErrors(['id_jurusan' => 'Jurusan tidak ditemukan']);
        }

        // Gabungkan tingkat dengan nama jurusan
        $nama_kelas = $validasi['tingkat'] . ' ' . $jurusan->nama;
        if (!empty($validasi['urutan'])) {
            $nama_kelas .= ' ' . $validasi['urutan'];
        }

        // Simpan data ke database
        $local = new Local();
        $local->nama = $nama_kelas;
        $local->tingkat = $validasi['tingkat']; // Tambahkan kolom tingkat
        $local->urutan = $validasi['urutan'] ?? ''; // Tambahkan kolom urutan
        $local->kapasitas = $validasi['kapasitas']; // Tambahkan kolom kapasitas
        $local->tahun_ajaran = $validasi['tahun_ajaran']; // Tambahkan kolom tahun_ajaran
        $local->id_jurusan = $validasi['id_jurusan'];
        $local->id_guru = $validasi['id_guru'];
        $local->save();

        return redirect(route('local.index'));
    }

    public function show($id)
    {
        $local = Local::with(['guru', 'jurusan'])->findOrFail($id);
        return view('admin.local.show', [
            'local' => $local,
            'menu' => 'local'
        ]);
    }

    public function edit($id)
    {
        $local = Local::with('jurusan', 'guru')->find($id);
        $gurus = guru::all(); // Ambil semua guru
        $jurusan = jurusan::all();

        $guru_terpakai = Local::pluck('id_guru')->toArray();

        return view('admin.local.edit', [
            'menu' => 'local',
            'title' => 'Edit Data Siswa',
            'local' => $local,
            'jurusan' => $jurusan,
            'guru' => $gurus, // Kirim variabel $gurus
            'guru_terpakai' => $guru_terpakai,

        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'tingkat' => 'required',
            'urutan' => 'nullable',
            'kapasitas' => 'required',
            'tahun_ajaran' => 'required',
            'id_jurusan' => 'required',
            'id_guru' => 'required'
        ], [
            'tingkat.required' => 'Tingkat harus dipilih',
            'kapasitas.required' => 'Jumlah siswa harus dipilih',
            'tahun_ajaran.required' => 'Tahun ajaran harus dipilih',
            'id_jurusan.required' => 'Jurusan harus dipilih',
            'id_guru.required' => 'Wali kelas harus dipilih'
        ]);

        // Ambil data kelas berdasarkan id
        $local = Local::find($id);
        if (!$local) {
            return back()->withErrors(['error' => 'Data tidak ditemukan']);
        }

        // Ambil nama jurusan berdasarkan id_jurusan
        $jurusan = Jurusan::find($validasi['id_jurusan']);
        if (!$jurusan) {
            return back()->withErrors(['id_jurusan' => 'Jurusan tidak ditemukan']);
        }

        // Gabungkan tingkat dengan nama jurusan
        $nama_kelas = $validasi['tingkat'] . ' ' . $jurusan->nama;
        if (!empty($validasi['urutan'])) {
            $nama_kelas .= ' ' . $validasi['urutan'];
        }

        // Update data di database
        $local->nama = $nama_kelas;
        $local->tingkat = $validasi['tingkat']; // Tambahkan kolom tingkat
        $local->urutan = $validasi['urutan'] ?? ''; // Tambahkan kolom urutan
        $local->kapasitas = $validasi['kapasitas']; // Tambahkan kolom kapasitas
        $local->tahun_ajaran = $validasi['tahun_ajaran']; // Tambahkan kolom tahun_ajaran
        $local->id_jurusan = $validasi['id_jurusan'];
        $local->id_guru = $validasi['id_guru'];
        $local->save();

        return redirect(route('local.index'));
    }

    public function destroy($id)
    {
        $local = local::find($id);
        $local->delete();
        return redirect(route('local.index'));
    }
}
