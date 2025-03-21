<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [LoginController::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
Route::get('/dashboardAdmin', [dashboardcontroller::class, 'dashboard'])->name('dashboard.admin');

Route::resource('siswa', siswacontroller::class);
Route::resource('guru', GuruController::class);
Route::resource('local', LocalController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('ortu', OrtuController::class);
Route::resource('user', UserController::class);

Route::get('/dashboard', [dashboardcontroller::class, 'dashboardGuru'])->name('dashboard.guru');
Route::resource('absen', AbsenController::class);
Route::post('absen/updateStatus', [AbsenController::class, 'updateStatus'])->name('absen.updateStatus');
Route::get('absen/{id}/edit', [AbsenController::class, 'edit'])->name('absen.edit');
Route::put('absen/{id}', [AbsenController::class, 'update'])->name('absen.update');

Route::get('absenAdmin', [AbsenController::class, 'index2'])->name('absen.index2');
Route::get('absenAdmin/create', [AbsenController::class, 'create2'])->name('absen.create2');
Route::post('absenAdmin/store', [AbsenController::class, 'store2'])->name('absen.store2');
Route::post('absenAdmin/updateStatus', [AbsenController::class, 'updateStatus2'])->name('absen.updateStatus2');
Route::get('absenAdmin/{id}/edit', [AbsenController::class, 'edit2'])->name('absen.edit2');
Route::put('absenAdmin/{id}', [AbsenController::class, 'update2'])->name('absen.update2');
Route::delete('absen/{id}/destroy2', [AbsenController::class, 'destroy2'])->name('absen.destroy2');

Route::get('/dashboardSiswa', [dashboardcontroller::class, 'dashboardSiswa'])->name('dashboard.siswa');
});