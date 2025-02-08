<?php

namespace App\Http\Controllers;

use App\Models\Detail_kelas;
use App\Models\Kelas;
use App\Models\Kepsek;
use App\Models\Mapel;
use App\Models\Penilaian;
use App\Models\Siswa;
use App\Models\Wali_Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KepsekController extends Controller
{
    public function kepsek_kelas()
    {

        $title = 'Kelas';
        $data = Detail_kelas::with('kelas')->where('nama_kelas', 'like', '%' . request('cari') . '%')->orWhereHas('kelas', function ($query) {
            $query->where('kelas', 'like', '%' . request('cari') . '%');
        })
            ->paginate(20);
        return view('kepsek.kelas_kepsek', compact('title', 'data'));
    }

public function lihat_progres($id_detail_kelas){
        $title='Progres Siswa';
        $detailKelas = Detail_kelas::find($id_detail_kelas);
        $wali_kelas=Wali_Kelas::where('id_detail_kelas',$id_detail_kelas)->first();
        $siswas = Siswa::with('penilaians','detail_kelas')->where('id_detail_kelas', $id_detail_kelas)->get();

        foreach ($siswas as $siswa) {
            // Ambil kelas siswa saat ini (sesuai id_detail_kelas terakhir yang dia ikuti)


            // Hitung total mapel yang harus dinilai untuk kelas siswa dan semester tertentu
            $totalMapel = Mapel::where('id_kelas', $detailKelas->id_kelas)->where('semester',$siswa->semester)->count();


            // Hitung jumlah mapel yang sudah dinilai untuk siswa ini berdasarkan semester & tahun ajaran
            $mapelDinilai = Penilaian::where('id_siswa', $siswa->nisn)
                ->where('id_detail_kelas', $detailKelas->id)
                ->where('semester', $siswa->semester)

                ->distinct('id_mapel')
                ->count('id_mapel');

            // Hitung progres dalam persen
            $siswa->progres_penilaian = $totalMapel > 0 ? round(($mapelDinilai / $totalMapel) * 100, 2) : 0;
        }
        return view('kepsek.siswa_progres',compact('title','siswas','detailKelas','wali_kelas'));
}


    public function atur_kepsek(){
        $data=Kepsek::first();
        $title='Data Kepsek';

        return view('kepsek.atur_kepsek',compact('title','data'));
    }

    public function update_kepsek(Request $request,$nip){

        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
// dd($request->nipp);
        $kepsek = Kepsek::where('nip',$nip)->first();
        $kepsek->nip = $request->nipp;
        $kepsek->nama = $request->nama;
        $kepsek->alamat = $request->alamat;
        $kepsek->jenis_kelamin = $request->jenis_kelamin;
        $kepsek->save();
        return redirect()->route('atur_kepsek')->with('success', 'Data berhasil diubah');
    }
}
