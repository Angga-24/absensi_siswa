<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\dashboardcontroller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboardAdmin', [dashboardcontroller::class, 'dashboard'])->name('dashboard.admin');

Route::resource('siswa', siswacontroller::class);
Route::resource('guru', GuruController::class);
Route::resource('local', LocalController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('ortu', OrtuController::class);
Route::resource('user', UserController::class);

