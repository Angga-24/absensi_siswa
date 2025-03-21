<?php

namespace App\Http\Controllers;

use App\Models\local;
use App\Models\siswa;
use App\Models\Mengabsen;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $query = Mengabsen::with(['siswa', 'guru']);

        if ($request->has('kelas') && $request->kelas != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('id_local', $request->kelas);
            });
        }

        if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
            $query->whereDate('tanggal', $request->tanggal_absen);
        }

        $dataabsen = $query->get();
        $locals = local::all();

        return view('guru.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'dataabsen' => $dataabsen,
            'locals' => $locals
        ]);
    }

    public function create(Request $request)
    {
        $query = siswa::with('local');

        if ($request->has('kelas') && $request->kelas != '') {
            $query->where('id_local', $request->kelas);
        }

        $datasiswa = $query->get();
        $locals = local::all();

        return view('guru.absen.create', [
            'menu' => 'absen',
            'title' => 'Absen Siswa',
            'datasiswa' => $datasiswa,
            'locals' => $locals
        ]);
    }

    public function updateStatus(Request $request)
    {
        $statuses = $request->input('status', []);
        $currentDate = now();
        $currentTime = now()->toTimeString();
        $guru = Guru::where('username', Auth::user()->username)->first(); // Get the logged-in guru

        foreach ($statuses as $id => $status) {
            $siswa = siswa::findOrFail($id);
            $siswa->status = $status;
            $siswa->tanggal_absen = $currentDate;
            $siswa->save();

            Mengabsen::create([
                'tanggal' => $currentDate,
                'jam_masuk' => $currentTime,
                'jam_pulang' => $currentTime,
                'status' => $status,
                'id_guru' => $guru->id,
                'id_siswa' => $id,
            ]);
        }

        return redirect()->route('absen.index')->with('success', 'Status siswa dan tanggal absen berhasil diperbarui.');
    }

    public function edit($id)
    {
        $mengabsen = Mengabsen::with('siswa.local')->findOrFail($id);
        return view('guru.absen.ubah', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'mengabsen' => $mengabsen
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ], [
            'status.required' => 'Status harus diisi',
        ]);

        $mengabsen = Mengabsen::findOrFail($id);
        $mengabsen->status = $validasi['status'];
        $mengabsen->save();

        $siswa = siswa::findOrFail($mengabsen->id_siswa);
        $siswa->status = $validasi['status'];
        $siswa->save();

        return redirect(route('absen.index'))->with('success', 'Status siswa berhasil diperbarui.');
    }

    public function index2(Request $request)
    {
        $query = Mengabsen::with(['siswa', 'guru']);

        if ($request->has('kelas') && $request->kelas != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('id_local', $request->kelas);
            });
        }

        if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
            $query->whereDate('tanggal', $request->tanggal_absen);
        }

        $dataabsen = $query->get();
        $locals = local::all();

        return view('admin.absen.index', [
            'menu' => 'absenAdmin',
            'title' => 'Data Absen',
            'dataabsen' => $dataabsen,
            'locals' => $locals
        ]);
    }

    public function create2(Request $request)
    {
        $query = siswa::with('local');

        if ($request->has('kelas') && $request->kelas != '') {
            $query->where('id_local', $request->kelas);
        }

        $datasiswa = $query->get();
        $locals = local::all();

        return view('admin.absen.create', [
            'menu' => 'absen',
            'title' => 'Absen Siswa',
            'datasiswa' => $datasiswa,
            'locals' => $locals
        ]);
    }

    public function updateStatus2(Request $request)
    {
        $statuses = $request->input('status', []);
        $currentDate = now();
        $currentTime = now()->toTimeString();
        $guru = Guru::where('username', Auth::user()->username)->first(); // Get the logged-in guru

        foreach ($statuses as $id => $status) {
            $siswa = siswa::findOrFail($id);
            $siswa->status = $status;
            $siswa->tanggal_absen = $currentDate;
            $siswa->save();

            Mengabsen::create([
                'tanggal' => $currentDate,
                'jam_masuk' => $currentTime,
                'jam_pulang' => $currentTime,
                'status' => $status,
                'id_guru' => $guru->id,
                'id_siswa' => $id,
            ]);
        }

        return redirect()->route('absen.index2');
    }

    public function edit2($id)
    {
        $mengabsen = Mengabsen::with('siswa.local')->findOrFail($id);
        return view('admin.absen.ubah', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'mengabsen' => $mengabsen
        ]);
    }

    public function update2(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ], [
            'status.required' => 'Status harus diisi',
        ]);

        $mengabsen = Mengabsen::findOrFail($id);
        $mengabsen->status = $validasi['status'];
        $mengabsen->save();

        $siswa = siswa::findOrFail($mengabsen->id_siswa);
        $siswa->status = $validasi['status'];
        $siswa->save();

        return redirect(route('absen.index2'))->with('success', 'Status siswa berhasil diperbarui.');
    }

    public function destroy2($id)
    {
        $siswa = siswa::findOrFail($id);
        $siswa->status = 'null';
        $siswa->save();

        return redirect(route('absen.index2'))->with('success', 'Status siswa berhasil diubah menjadi null.');
    }

    public function rekapAbsensi($id)
    {
        $siswa = siswa::findOrFail($id);
        $rekapAbsensi = mengabsen::where('id_siswa', $id)->with('guru')->get();

        return view('guru.dashboard', [
            'menu' => 'rekap',
            'title' => 'Rekap Absensi ' . $siswa->nama,
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi
        ]);
    }
}
