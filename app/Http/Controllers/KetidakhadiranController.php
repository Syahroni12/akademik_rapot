<?php

namespace App\Http\Controllers;

use App\Models\Detail_kelas;
use App\Models\Ketidakhadiran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KetidakhadiranController extends Controller
{
public function index()
{
    // $id_detail_kelas = Detail_kelas::find($id_detail_kelas);
    $title = 'Data Siswa Kelas';
    $data = Siswa::with('detail_kelas')->where('id_detail_kelas', Auth::user()->wali_kelas->id_detail_kelas)->get();
    return view('ketidakhadiran.siswa', compact('data', 'title'));

    // return view('kepsek.kelas_kepsek', compact('title', 'data'));
    // return view('ketidakhadiran.index', compact('data', 'title'));

}


public function simpan_absen(Request $request) {


    $validator = Validator::make($request->all(), [
        'id_siswa' => 'required',
        // 'tanggal' => 'required',
        'sakit' => 'required',
        'izin' => 'required',
        'alpha' => 'required',

    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $siswa = Siswa::where('nisn', $request->id_siswa)->first();
    $ketidakhadiran = new Ketidakhadiran();
    $ketidakhadiran->id_siswa = $request->id_siswa;
    $ketidakhadiran->sakit = $request->sakit;
    $ketidakhadiran->izin = $request->izin;
    $ketidakhadiran->alpha = $request->alpha;
    $ketidakhadiran->id_detail_kelas = $siswa->id_detail_kelas;
    $ketidakhadiran->semester = $siswa->semester;
    $ketidakhadiran->save();
    Alert::success('Berhasil', 'Data berhasil disimpan');
    return redirect()->route('kelas_hadir',)->with('success', 'Data berhasil disimpan');

}

public function update_absen(Request $request, $id) {
    $validator = Validator::make($request->all(), [

'izin' => 'required',
        'alpha' => 'required',
        'sakit' => 'required',

        // 'tanggal' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $ketidakhadiran = Ketidakhadiran::where('id', $id)->first();
    $ketidakhadiran->izin = $request->izin;
    $ketidakhadiran->alpha = $request->alpha;
    $ketidakhadiran->sakit = $request->sakit;
    $ketidakhadiran->save();
    Alert::success('Berhasil', 'Data berhasil disimpan');
    return redirect()->route('kelas_hadir',)->with('success', 'Data berhasil disimpan');

}



public function absen($nisn)

{
 $siswa=Siswa::find($nisn);
 $title = 'Absen Siswa' . $siswa->nama;

 $cek=Ketidakhadiran::where('id_siswa', $siswa->nisn)->where('semester', $siswa->semester)->where('id_detail_kelas', $siswa->id_detail_kelas)->first();
 if ($cek) {


    return view('ketidakhadiran.absen_edit', compact('title', 'cek', 'siswa'));
 }else{

    return view('ketidakhadiran.absen', compact('title', 'siswa'));

 }



}



}
