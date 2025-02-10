<?php

namespace App\Http\Controllers;

use App\Models\Detail_kelas;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Wali_Kelas;
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
                return redirect()->route('dashboard_admin');
                break;
            case 'kepsek':
                return redirect()->route('dashboard_kepsek');
                break;
            case 'wali_kelas':
                return redirect()->route('dashboard_walikelas');
                break;
            case 'siswa':
                return redirect()->route('dashboard_siswa');
                break;
            default:
                return redirect()->route('login');
                break;
        }
    }


public function dashboard_admin(){

$title= 'Dashboard Admin';
// $title = 'Dashboard Kepsek';

$jumlah_kelas = Kelas::count();
$jumlah_detailkelas=Detail_kelas::count();
$jumlah_siswa = Siswa::count();
$jumlah_wali_kelas = Wali_Kelas::count();
$jumlah_mapel = Mapel::count();
$jumlah_ekskul = Ekskul::count();
$jumlah_jurusan = Jurusan::count();


return view('dashboard_admin',compact('title','jumlah_kelas','jumlah_siswa','jumlah_wali_kelas','jumlah_mapel','jumlah_ekskul','jumlah_jurusan','jumlah_detailkelas'));

    }
}
