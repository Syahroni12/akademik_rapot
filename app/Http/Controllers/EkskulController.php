<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\pengikut_ekskul;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EkskulController extends Controller
{
    public function index()
    {
        $title = 'Ekskul';
        $data = Ekskul::where('ekskul', 'like', '%' . request('cari') . '%')->paginate(20);
        return view('ekskul', compact('title', 'data'));
    }
    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ekskul' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $ekskul = new Ekskul();
        $ekskul->ekskul = $request->ekskul;
        $ekskul->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('ekskul');
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ekskul' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $ekskul = Ekskul::find($request->id);
        $ekskul->ekskul = $request->ekskul;
        $ekskul->save();
        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('ekskul');
    }

    public function hapus($id)
    {
        $ekskul = Ekskul::find($id);
        $ekskul->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('ekskul');
    }



    public function pengikut_ekskul()
    {

        $title = 'Kelola Siswa di Ekskul';
        $data = Siswa::with('detail_kelas')->where('nama', 'like', '%' . request('cari') . '%')
            ->orWhere('nisn', 'like', '%' . request('cari') . '%')
            ->orWhere('jenis_kelamin', 'like', '%' . request('cari') . '%')
            ->orWhere('semester', 'like', '%' . request('cari') . '%')
            ->orWhere('tahun_masuk', 'like', '%' . request('cari') . '%')
            ->orWhere('tempat_lahir', 'like', '%' . request('cari') . '%')
            ->orWhere('id_detail_kelas', 'like', '%' . request('cari') . '%')
            ->orWhereHas('detail_kelas', function ($query) {
                $query->where('nama_kelas', 'like', '%' . request('cari') . '%');
            })
            ->paginate(20);
        return view('pengikut_ekskul.index', compact('title', 'data'));
    }

    public function detail_daftarekskul($id_siswa)
    {
        $data = pengikut_ekskul::with('siswa', 'ekskul')->where('id_siswa', $id_siswa)->paginate(20);
        if ($data->isEmpty()) {
            Alert::info('Info', 'Siswa Belum Mengikuti Ekskul');
            return redirect()->route('pengikut_ekskul');
        }
        $title = 'Detail Ekskul Yang Diikuti Siswa : ' . $data[0]->siswa->nama;
        return view('pengikut_ekskul.detail', compact('title', 'data'));
    }


    public function tambah_pengikut_ekskul($id_siswa)
    {
        $title = 'Daftarkan Sebagai Pengikut Ekskul';
        $siswa = Siswa::find($id_siswa);
        $exsistingEkstuls = DB::table('pengikut_ekskuls')
            ->where('id_siswa', $id_siswa)
            ->pluck('id_ekskul')->toArray();

        // Ambil ekskul yang belum diikuti oleh siswa
        $ekskuls = Ekskul::whereNotIn('id', $exsistingEkstuls)->get();
        return view('pengikut_ekskul.daftar_ekskul', compact('title', 'siswa', 'ekskuls'));
    }
    public function edit_pengikut_ekskul($id)
    {
        $title = 'Edit Pengikut Ekskul';

        $data = pengikut_ekskul::with('siswa', 'ekskul')->find($id);

        // Ambil ekskul yang belum diikuti oleh siswa
        $ekskuls = Ekskul::all();
        return view('pengikut_ekskul.editpengikut_ekskul', compact('title', 'ekskuls', 'data'));
    }

    public function store_pengikut_ekskul(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'id_ekskul' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $pengikut_ekskul = new pengikut_ekskul();
        $pengikut_ekskul->id_siswa = $request->id_siswa;
        $pengikut_ekskul->id_ekskul = $request->id_ekskul;
        $pengikut_ekskul->keterangan = $request->keterangan;
        $pengikut_ekskul->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('pengikut_ekskul');
    }
    public function update_pengikut_ekskul(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            // 'id_siswa' => 'required',
            'id_ekskul' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }

        $cek = pengikut_ekskul::where('id', '!=', $id)->where('id_ekskul', $request->id_ekskul)->where('id_siswa', $request->id_siswa)->first();
        if ($cek) {
            Alert::error('Gagal', 'Data Sudah Ada');
            return back()->withErrors($validator)->withInput();
        }


        $pengikut_ekskul = pengikut_ekskul::find($id);
        $pengikut_ekskul->id_siswa = $request->id_siswa;
        $pengikut_ekskul->id_ekskul = $request->id_ekskul;
        $pengikut_ekskul->keterangan = $request->keterangan;
        $pengikut_ekskul->save();
        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('detail_daftarekskul', $request->id_siswa);
    }



    public function hapus_pengikut_ekskul($id)
    {
        $pengikut_ekskul = pengikut_ekskul::find($id);
        $id_siswa = $pengikut_ekskul->id_siswa;
        $pengikut_ekskul->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('detail_daftarekskul', $id_siswa);
    }
}
