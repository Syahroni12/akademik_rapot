<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::post('/tambah_jurusan', [JurusanController::class, 'tambah'])->name('tambah_jurusan');
Route::post('/edit_jurusan', [JurusanController::class, 'edit'])->name('edit_jurusan');
Route::get('/hapus_jurusan/{id}', [JurusanController::class, 'hapus'])->name('hapus_jurusan');

Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
Route::post('/tambah_mapel', [MapelController::class, 'tambah'])->name('tambah_mapel');
Route::post('/edit_mapel', [MapelController::class, 'edit'])->name('edit_mapel');
Route::get('/hapus_mapel/{id}', [MapelController::class, 'hapus'])->name('hapus_mapel');
