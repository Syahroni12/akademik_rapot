<?php

namespace App\Http\Controllers;

use App\Models\Detail_kelas;
use App\Models\Kelas;
use App\Models\Kepsek;
use App\Models\Mapel;
use App\Models\pengikut_ekskul;
use App\Models\Penilaian;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Wali_Kelas;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Wali_kelasController extends Controller
{
    public function index()
    {
        $title = 'Data Wali Kelas';

        $query = Wali_Kelas::with('detail_kelas')
            ->where(function ($q) {
                $cari = request('cari');
                $q->where('nama', 'like', '%' . $cari . '%')
                    ->orWhere('nip', 'like', '%' . $cari . '%')
                    ->orWhere('jenis_kelamin', 'like', '%' . $cari . '%')
                    ->orWhere('tgl_lahir', 'like', '%' . $cari . '%')
                    ->orWhere('agama', 'like', '%' . $cari . '%')
                    ->orWhere('tempat_lahir', 'like', '%' . $cari . '%')
                    ->orWhere('alamat', 'like', '%' . $cari . '%')
                    ->orWhere('id_detail_kelas', 'like', '%' . $cari . '%');
            })
            ->orWhereHas('detail_kelas', function ($query) {
                $query->where('nama_kelas', 'like', '%' . request('cari') . '%');
            });

        $data = $query->paginate(10);

        return view('wali_kelas.index', compact('data', 'title'));
    }



    public function mapel_kelas($id_siswa)
    {

        $siswa = Siswa::where('nisn', $id_siswa)->first();
        $title = 'Mapel Kelas Siswa' . " " . ($siswa->nama);
        //     $mapels = Mapel::where('id_kelas', $siswa->detail_kelas->id_kelas)
        // ->where('semester', $siswa->semester)
        // ->whereDoesntHave('penilaians', function ($query) use ($id_siswa) {
        //     $query->where('id_siswa', $id_siswa);
        // })
        // ->get();
        $mapel_belum = Mapel::where('id_kelas', $siswa->detail_kelas->id_kelas)
            ->where('semester', $siswa->semester)
            ->whereDoesntHave('penilaian', function ($query) use ($id_siswa) {
                $query->where('id_siswa', $id_siswa);
            })
            ->get();

        $mapel_sudah = Penilaian::with('mapel')->where('id_siswa', $id_siswa)->where('semester', $siswa->semester)->where('id_detail_kelas', $siswa->id_detail_kelas)->get();
        return view('wali_kelas.mapel', compact('title', 'mapel_belum', 'mapel_sudah', 'siswa'));
    }


    public function tambah()
    {
        $title = 'Tambah Wali Kelas';
        $kelas = Detail_kelas::whereDoesntHave('wali_kelas')->get();

        return view('wali_kelas.tambah', compact('title', 'kelas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:wali_kelas,nip',
            'id_detail_kelas' => 'required|exists:detail_kelas,id',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
        ]);


        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
            $user = new User();
            $user->username = $request->nip;
            $user->password = bcrypt(12345);
            $user->role = 'wali_kelas';
            $user->save();
            $wali_kelas = new Wali_Kelas();
            $wali_kelas->nip = $request->nip;
            $wali_kelas->id_detail_kelas = $request->id_detail_kelas;
            $wali_kelas->nama = $request->nama;
            $wali_kelas->jenis_kelamin = $request->jenis_kelamin;
            $wali_kelas->tgl_lahir = $tgl_lahir;
            $wali_kelas->agama = $request->agama;
            $wali_kelas->id_user = $user->id;
            $wali_kelas->tempat_lahir = $request->tempat_lahir;
            $wali_kelas->alamat = $request->alamat;
            $wali_kelas->save();
            DB::commit();
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect()->route('walikelas');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Gagal', $th->getMessage());
            return back()->withInput();
        }
    }
    public function update(Request $request, $nip)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'id_detail_kelas' => 'required|exists:detail_kelas,id',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
        ]);


        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
            $cek = Wali_Kelas::where('nip', '!=', $nip)->where('id_detail_kelas', $request->id_detail_kelas)->first();
            if ($cek) {
                $ubah = Wali_Kelas::where('id_detail_kelas', $request->id_detail_kelas)->first();
                $ubah->id_detail_kelas = null;
                $ubah->save();
            }
            $wali_kelas = Wali_Kelas::where('nip', $nip)->first();
            $user =  User::where('id', $wali_kelas->id_user)->first();
            $user->username = $request->nip;

            $user->save();

            $wali_kelas->nip = $request->nip;
            $wali_kelas->id_detail_kelas = $request->id_detail_kelas;
            $wali_kelas->nama = $request->nama;
            $wali_kelas->jenis_kelamin = $request->jenis_kelamin;
            $wali_kelas->tgl_lahir = $tgl_lahir;
            $wali_kelas->agama = $request->agama;
            $wali_kelas->id_user = $user->id;
            $wali_kelas->tempat_lahir = $request->tempat_lahir;
            $wali_kelas->alamat = $request->alamat;
            $wali_kelas->save();
            DB::commit();
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect()->route('walikelas');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Gagal', $th->getMessage());
            return back()->withInput();
        }
    }


    public function hapus($nip)
    {
        $wali_kelas = Wali_Kelas::where('nip', $nip)->first();
        $user = User::where('id', $wali_kelas->id_user)->first();
        $wali_kelas->delete();
        $user->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('walikelas');
    }


    public function detail($nip)
    {
        $title = 'Detail Wali Kelas';
        $data = Wali_Kelas::where('nip', $nip)->first();
        return view('wali_kelas.detail', compact('title', 'data'));
    }
    public function edit($nip)
    {
        $title = 'Detail Wali Kelas';
        $kelas = Detail_kelas::all();
        $data = Wali_Kelas::where('nip', $nip)->first();
        return view('wali_kelas.edit', compact('title', 'data', 'kelas'));
    }


    public function kelasku()
    {

        $title = 'Kelas Ampu Saya';
        $data = Siswa::where('id_detail_kelas', Auth::user()->wali_kelas->id_detail_kelas)->paginate(20);
        return view('wali_kelas.kelasku', compact('title', 'data'));
    }



    public function nilai($id_siswa, $id_mapel)
    {


        $siswa = Siswa::where('nisn', $id_siswa)->first();
        $mapel = Mapel::where('kd_mapel', $id_mapel)->first();
        $title = 'Nilai Siswa Untuk Mapel ' . $mapel->mapel;
        return view('wali_kelas.nilai', compact('title', 'siswa', 'mapel'));
    }

    public function simpan_nilai(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'id_mapel' => 'required',
            // 'nilai' => 'required',
            'nh' => 'required',
            'uts' => 'required',
            'uas' => 'required',
            'deskripsi' => 'required',
            'tahun_ajaran1' => 'required',
            'tahun_ajaran2' => 'required',
            'semester' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();

            $penilaian = new Penilaian();
            $penilaian->id_siswa = $request->id_siswa;
            $penilaian->id_mapel = $request->id_mapel;
            $penilaian->nh = $request->nh;
            $penilaian->uts = $request->uts;
            $penilaian->uas = $request->uas;

            $nilai_akhir = ($request->nh + $request->uts + $request->uas) / 3;
            $penilaian->nilai_akhir = $nilai_akhir;
            $penilaian->id_wali_kelas = Auth::user()->wali_kelas->nip;
            $penilaian->id_detail_kelas = Auth::user()->wali_kelas->id_detail_kelas;
            $penilaian->deskripsi = $request->deskripsi;
            $penilaian->tahun_ajaran1 = $request->tahun_ajaran1;
            $penilaian->tahun_ajaran2 = $request->tahun_ajaran2;
            $penilaian->semester = $request->semester;
            $penilaian->save();
            DB::commit();
            Alert::success('Berhasil', 'Data berhasil ditambahkan');

            return redirect()->route('mapel_kelas', $request->id_siswa);
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Gagal', $th->getMessage());
            return back()->withInput();
        }
    }


    public function ubah_nilai($id)
    {
        $title = 'Ubah Nilai';
        $data = Penilaian::where('id', $id)->first();
        return view('wali_kelas.ubah_nilai', compact('title', 'data'));
    }


    public function update_nilai(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nh' => 'required',
            'uts' => 'required',
            'uas' => 'required',
            'deskripsi' => 'required',
            'tahun_ajaran1' => 'required',
            'tahun_ajaran2' => 'required',
            'semester' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();

            $penilaian = Penilaian::where('id', $id)->first();
            $penilaian->nh = $request->nh;
            $penilaian->uts = $request->uts;
            $penilaian->uas = $request->uas;
            $nilai_akhir = ($request->nh + $request->uts + $request->uas) / 3;
            $penilaian->nilai_akhir = $nilai_akhir;
            $penilaian->deskripsi = $request->deskripsi;
            $penilaian->tahun_ajaran1 = $request->tahun_ajaran1;
            $penilaian->tahun_ajaran2 = $request->tahun_ajaran2;
            $penilaian->semester = $request->semester;
            $penilaian->save();
            DB::commit();
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect()->route('mapel_kelas', $penilaian->id_siswa);
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Gagal', $th->getMessage());
            return back()->withInput();
        }
    }


    public function detail_nilai($id)
    {
        $title = 'Detail Nilai';
        $data = Penilaian::where('id', $id)->first();
        return view('wali_kelas.detail_nilai', compact('title', 'data'));
    }



    public function cetak_pdf($id_siswa)
    {
        $siswa = Siswa::where('nisn', $id_siswa)->first();

        $mapel_belum = Mapel::where('id_kelas', $siswa->detail_kelas->id_kelas)
            ->where('semester', $siswa->semester)
            ->whereDoesntHave('penilaian', function ($query) use ($id_siswa) {
                $query->where('id_siswa', $id_siswa);
            })
            ->get();

        if ($mapel_belum->count() > 0) {
            Alert::error('Gagal', 'Masih ada mapel yang belum dinilai');
            return back();
        }

        $mapel_sudah = Penilaian::with('mapel')->where('id_siswa', $id_siswa)->where('semester', $siswa->semester)->where('id_detail_kelas', $siswa->id_detail_kelas)->get();

        $wali_kelas = Wali_Kelas::where('id_detail_kelas', $siswa->id_detail_kelas)->first();

        $kepsek = Kepsek::first();

        $kelas = $siswa->detail_kelas->nama_kelas;
        $pengikut_ekskul = pengikut_ekskul::where('id_siswa', $id_siswa)->get();
        $kehadiran=Ket::where('id_siswa', $id_siswa)->get();




        // $mapel_belum = Mapel::where('id_kelas', $siswa->detail_kelas->id_kelas)
        // ->where('semester', $siswa->semester)
        // ->whereDoesntHave('penilaian', function ($query) use ($id_siswa) {
        //     $query->where('id_siswa', $id_siswa);
        // })
        // ->get();

    }


    public function tes(){

        $pdf = PDF::loadView('rapor');
        return $pdf->download('rapor.pdf');

    }
}
