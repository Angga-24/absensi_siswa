<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\dashboardcontroller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [dashboardcontroller::class, 'dashboard'])->name('home');

Route::resource('siswa', siswacontroller::class);