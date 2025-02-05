<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Wali_Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Wali_kelasController extends Controller
{
    public function index()
    {
        $title = 'Data Wali Kelas';
        $data = Wali_Kelas::with('kelas')->where('nama', 'like', '%' . request('cari') . '%')
            ->orWhere('nip', 'like', '%' . request('cari') . '%')
            ->orWhere('jenis_kelamin', 'like', '%' . request('cari') . '%')
            ->orWhere('tgl_lahir', 'like', '%' . request('cari') . '%')
            ->orWhere('agama', 'like', '%' . request('cari') . '%')
            ->orWhere('tempat_lahir', 'like', '%' . request('cari') . '%')
            ->orWhere('alamat', 'like', '%' . request('cari') . '%')
            ->orWhere('id_kelas', 'like', '%' . request('cari') . '%')
            ->orWhereHas('kelas', function ($query) {
                $query->where('kelas', 'like', '%' . request('cari') . '%');
            })
            ->paginate(10);
        return view('wali_kelas.index', compact('data', 'title'));
    }

    public function tambah()
    {
        $title = 'Tambah Wali Kelas';
        $kelas = Kelas::whereDoesntHave('wali_kelas')->get();

        return view('wali_kelas.tambah', compact('title', 'kelas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:wali_kelas,nip',
            'id_kelas' => 'required|exists:kelas,id',
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
            $wali_kelas->id_kelas = $request->id_kelas;
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

}
