<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $level = Auth::user()->role;
        Alert::success('Success', 'Login Berhasil di lakukan');

switch ($level) {
    case 'admin':
        return redirect()->route('jurusan');
        break;
    case 'kepsek':
        return redirect()->route('kepsek_kelas');
        break;
    case 'wali_kelas':
        return redirect()->route('penilaian');
        break;
    case 'siswa':
        return redirect()->route('mapelku');
        break;
    default:
        return redirect()->route('login');
        break;
}

        }
}
