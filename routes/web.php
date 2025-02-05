<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Wali_kelasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest');


Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::post('/tambah_jurusan', [JurusanController::class, 'tambah'])->name('tambah_jurusan');
Route::post('/edit_jurusan', [JurusanController::class, 'edit'])->name('edit_jurusan');
Route::get('/hapus_jurusan/{id}', [JurusanController::class, 'hapus'])->name('hapus_jurusan');

Route::get('/ekskul', [EkskulController::class, 'index'])->name('ekskul');
Route::post('/tambah_ekskul', [EkskulController::class, 'tambah'])->name('tambah_ekskul');
Route::post('/edit_ekskul', [EkskulController::class, 'edit'])->name('edit_ekskul');
Route::get('/hapus_ekskul/{id}', [EkskulController::class, 'hapus'])->name('hapus_ekskul');

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
Route::get('/tambah_kelas', [KelasController::class, 'tambah'])->name('tambah_kelas');
Route::post('/tambah_kelass', [KelasController::class, 'store'])->name('tambah_kelass');
Route::get('/edit_kelas/{id}', [KelasController::class, 'edit'])->name('edit_kelas');
Route::put('/edit_kelass/{id}', [KelasController::class, 'update'])->name('edit_kelass');
Route::get('/hapus_kelas/{id}', [KelasController::class, 'hapus'])->name('hapus_kelas');

Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
Route::get('/tambah_mapel', [MapelController::class, 'tambah'])->name('tambah_mapel');
Route::post('/tambah_mapell', [MapelController::class, 'store'])->name('tambah_mapell');
Route::put('/update_mapel/{kd_mapel}', [MapelController::class, 'update'])->name('update_mapel');
// Route::get('/edit_mapel/{ld', [MapelController::class, 'edit'])->name('edit_mapel');
Route::get('/hapus_mapel/{kd_mapel}', [MapelController::class, 'hapus'])->name('hapus_mapel');
Route::get('/edit_mapel/{kd_mapel}', [MapelController::class, 'edit'])->name('edit_mapel');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/tambah_siswa', [SiswaController::class, 'tambah'])->name('tambah_siswa');
Route::post('/tambah_siswaa', [SiswaController::class, 'store'])->name('tambah_siswaa');
Route::put('/update_siswa/{nisn}', [SiswaController::class, 'update'])->name('update_siswa');
// Route::get('/edit_siswa/{ld', [SiswaController::class, 'edit'])->name('edit_siswa');
Route::get('/hapus_siswa/{nisn}', [SiswaController::class, 'hapus'])->name('hapus_siswa');

Route::get('/edit_siswa/{nisn}', [SiswaController::class, 'edit'])->name('edit_siswa');
Route::get('/detail_siswa/{nisn}', [SiswaController::class, 'detail'])->name('detail_siswa');

Route::get('/walikelas', [Wali_kelasController::class, 'index'])->name('walikelas');
Route::get('/tambah_walikelas', [Wali_kelasController::class, 'tambah'])->name('tambah_walikelas');
Route::post('/tambah_walikelass', [Wali_kelasController::class, 'store'])->name('tambah_walikelass');
Route::put('/update_walikelas/{nip}', [Wali_kelasController::class, 'update'])->name('update_walikelas');
// Route::get('/edit_walikelas/{ld', [Wali_kelasController::class, 'edit'])->name('edit_walikelas');
Route::get('/hapus_walikelas/{nip}', [Wali_kelasController::class, 'hapus'])->name('hapus_walikelas');
Route::get('/edit_walikelas/{nip}', [Wali_kelasController::class, 'edit'])->name('edit_walikelas');
Route::get('/detail_walikelas/{nip}', [Wali_kelasController::class, 'detail'])->name('detail_walikelas');
Route::post('/ubah_password', [SiswaController::class, 'ubah_password'])->name('ubah_password');




