<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes - Aplikasi Absensi Sederhana
|--------------------------------------------------------------------------
*/

// --- GRUP LOGIN ---
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login-proses', [SiswaController::class, 'prosesLogin'])->name('login.proses');


// --- GRUP DASHBOARD & NAVIGASI ---
Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
Route::get('/absensi', [SiswaController::class, 'absensi'])->name('absensi.index');


// --- GRUP MANAJEMEN SISWA ---
Route::get('/siswa/tambah', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/simpan', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');


// --- GRUP ABSENSI & LAPORAN ---
Route::get('/absensi/{kelas}', [SiswaController::class, 'showKelas'])->name('absensi.show');
Route::post('/absensi/simpan', [SiswaController::class, 'simpanAbsen'])->name('absensi.simpan');
Route::get('/absensi/rekap/{kelas}', [SiswaController::class, 'rekapKelas'])->name('absensi.rekap');


// --- FITUR LOGOUT ---
Route::get('/logout', function () {
    session()->forget('is_login');
    return redirect()->route('login')->with('success', 'Berhasil keluar sistem');
})->name('logout');