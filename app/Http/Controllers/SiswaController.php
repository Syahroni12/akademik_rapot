<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function index()
    {

        $title = 'Siswa';
        $data = Siswa::with('kelas')->where('nama', 'like', '%' . request('cari') . '%')
            ->orWhere('nisn', 'like', '%' . request('cari') . '%')
            ->orWhere('jenis_kelamin', 'like', '%' . request('cari') . '%')
            ->orWhere('semester', 'like', '%' . request('cari') . '%')
            ->orWhere('tahun_masuk', 'like', '%' . request('cari') . '%')
            ->orWhere('tempat_lahir', 'like', '%' . request('cari') . '%')
            ->orWhere('id_kelas', 'like', '%' . request('cari') . '%')
            ->orWhereHas('kelas', function ($query) {
                $query->where('kelas', 'like', '%' . request('cari') . '%');
            })
            ->paginate(20);

        return view('siswa.index', compact('title', 'data'));
    }

    public function tambah()
    {
        $title = 'Tambah Siswa';
        $kelas = Kelas::all();
        return view('siswa.tambah', compact('title', 'kelas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|unique:siswas,nisn',
            'id_kelas' => 'required|exists:kelas,id',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tahun_masuk' => 'required',
        ]);


        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));

        $user = new User();
        $user->username = $request->nisn;
        $user->password = bcrypt($request->nisn);
        $user->role = 'siswa';
        $user->save();


        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tgl_lahir = $tgl_lahir;
        $siswa->agama = $request->agama;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tahun_masuk = $request->tahun_masuk;
        $siswa->id_user = $user->id;
        $siswa->save();
        Alert::success('Berhasil', 'Data berhasil ditambahkan');

        return redirect()->route('siswa');
    }
    public function hapus($nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->first();
        $user = User::where('id', $siswa->id_user)->first();
        $siswa->delete();
        $user->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('siswa');
    }

    public function edit($nisn)
    {
        $title = 'Edit Siswa';
        $kelas = Kelas::all();
        $data = Siswa::where('nisn', $nisn)->first();
        return view('siswa.edit', compact('title', 'kelas', 'data'));
    }

    public function update(Request $request, $nisn)
    {
        $validator = Validator::make($request->all(), [
            'id_kelas' => 'required|exists:kelas,id',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tahun_masuk' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();

        $tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
        $siswa = Siswa::where('nisn', $nisn)->first();
        $user = User::where('id', $siswa->id_user)->first();
        $user->username = $request->nisn;
        $user->password = bcrypt($request->nisn);
        $user->save();
        $siswa->nisn = $request->nisn;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tgl_lahir = $tgl_lahir;
        $siswa->agama = $request->agama;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tahun_masuk = $request->tahun_masuk;
        $siswa->save();
        DB::commit();
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('siswa');
    } catch (\Throwable $th) {
        DB::rollBack();
        Alert::error('Gagal', 'Data tidak ditemukan');
        return redirect()->route('siswa');
    }
    }

    public function detail($nisn)
    {
        $title = 'Detail Siswa';
        $data = Siswa::with('kelas')->where('nisn', $nisn)->first();
        return view('siswa.detail', compact('title', 'data'));
    }

    public function ubah_password(Request $request)
    {
        // dd($request->all());
        $user = User::where('id', $request->id_user)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        Alert::success('Berhasil', 'Password berhasil diubah');
        return back();
    }
}
