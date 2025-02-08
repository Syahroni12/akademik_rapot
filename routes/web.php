<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\KetidakhadiranController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Wali_kelasController;
use Illuminate\Support\Facades\Auth;
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
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin')->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
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

    Route::get('/detail_kelas', [KelasController::class, 'detail_kelas'])->name('detail_kelas');
    Route::get('/tambah_detail_kelas', [KelasController::class, 'tambah_detail_kelas'])->name('tambah_detail_kelas');
    Route::post('/tambah_detail_kelass', [KelasController::class, 'tambah_detail_kelass'])->name('tambah_detail_kelass');
    Route::get('/edit_detail_kelas/{id}', [KelasController::class, 'edit_detail_kelas'])->name('edit_detail_kelas');
    Route::put('/edit_detailkelass/{id}', [KelasController::class, 'edit_detail_kelass'])->name('edit_detail_kelass');
    Route::get('/hapus_detail_kelas/{id}', [KelasController::class, 'hapus_detail_kelas'])->name('hapus_detail_kelas');

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
    Route::get('/edit_walikelas/{ld', [Wali_kelasController::class, 'edit'])->name('edit_walikelas');
    Route::get('/hapus_walikelas/{nip}', [Wali_kelasController::class, 'hapus'])->name('hapus_walikelas');
    // Route::get('/edit_walikelas/{nip}', [Wali_kelasController::class, 'edit'])->name('edit_walikelas');
    Route::get('/detail_walikelas/{nip}', [Wali_kelasController::class, 'detail'])->name('detail_walikelas');



    Route::get('/atur_kepsek', [KepsekController::class, 'atur_kepsek'])->name('atur_kepsek');
    Route::put('/update_kepsek/{id}', [KepsekController::class, 'update_kepsek'])->name('update_kepsek');



});

// Route::middleware(['auth', 'kepsek'])->group(function () {
//     Route::get('/kepsek/dashboard', [DashboardController::class, 'index'])->name('kepsek.dashboard');
// });

Route::middleware(['auth', 'wali_kelas'])->group(function () {
    Route::get('/penilaian', [Wali_kelasController::class, 'kelasku'])->name('penilaian');
    Route::get('/mapel_kelas/{id_siswa}', [Wali_kelasController::class, 'mapel_kelas'])->name('mapel_kelas');
    Route::get('/nilai/{id_siswa}/{id_mapel}', [Wali_kelasController::class, 'nilai'])->name('halaman_nilai');
    Route::get('/ubah_nilai/{id}', [Wali_kelasController::class, 'ubah_nilai'])->name('halaman_ubah_nilai');

    Route::put('/update_nilai/{id}', [Wali_kelasController::class, 'update_nilai'])->name('halaman_update_nilai');
    Route::post('/simpan_nilai', [Wali_kelasController::class, 'simpan_nilai'])->name('simpan_nilai');



    Route::get('/pengikut_ekskul', [EkskulController::class, 'pengikut_ekskul'])->name('pengikut_ekskul');
    Route::get('/ekskul_yangdiikuti/{id_siswa}', [EkskulController::class, 'detail_daftarekskul'])->name('detail_daftarekskul');
    Route::get('/edit_pengikut_ekskul/{id}', [EkskulController::class, 'edit_pengikut_ekskul'])->name('edit_pengikut_ekskul');

    Route::get('/tambah_daftarekskul/{id_siswa}', [EkskulController::class, 'tambah_pengikut_ekskul'])->name('tambah_daftarekskul');
    Route::post('/store_daftarekskul', [EkskulController::class, 'store_pengikut_ekskul'])->name('store_daftarekskul');
    Route::put('/update_pengikut_ekskul/{id}', [EkskulController::class, 'update_pengikut_ekskul'])->name('update_pengikut_ekskul');
    Route::get('/hapus_pengikut_ekskul/{id}', [EkskulController::class, 'hapus_pengikut_ekskul'])->name('hapus_pengikut_ekskul');





    Route::get('/kelas_hadir', [KetidakhadiranController::class, 'index'])->name('kelas_hadir');
    // Route::get('/siswa_hadir/{id_detail_kelas}', [KetidakhadiranController::class, 'siswa'])->name('siswa_hadir');
    Route::get('/absen/{id_siswa}', [KetidakhadiranController::class, 'absen'])->name('absen');
    Route::post('/simpan_absen', [KetidakhadiranController::class, 'simpan_absen'])->name('simpan_absen');
    Route::put('/update_absen/{id}', [KetidakhadiranController::class, 'update_absen'])->name('update_absen');

});
Route::get('/detail_nilai/{id}', [Wali_kelasController::class, 'detail_nilai'])->name('halaman_detail_nilai');

Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('/mapelku', [SiswaController::class, 'mapelku'])->name('mapelku');
    Route::get('/detail_nilai/{id_mapel}', [SiswaController::class, 'detail_nilai'])->name('detail_nilai');
});

Route::middleware(['auth', 'kepsek'])->group(function () {
    Route::get('/kepsek_kelas', [KepsekController::class, 'kepsek_kelas'])->name('kepsek_kelas');
    Route::get('/lihat_progres/{id_detail_kelas}', [KepsekController::class, 'lihat_progres'])->name('lihat_progres');
});



// Route::get('/cetak_rapor/{id_siswa}', [Wali_kelasController::class, 'cetak_pdf'])->name('cetak_pdf');
Route::get('/tes', [Wali_kelasController::class, 'tes'])->name('tes');

Route::post('/ubah_password', [SiswaController::class, 'ubah_password'])->name('ubah_password');
