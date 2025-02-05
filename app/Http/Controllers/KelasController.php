<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function index()
    {
        $title = 'Kelas';
        // $jurusan=Jurusan::all();
        $data = Kelas::with('jurusan')->where('kelas', 'like', '%' . request('cari') . '%')->orWhereHas('jurusan', function ($query) {
            $query->where('jurusan', 'like', '%' . request('cari') . '%');
        })
            ->paginate(20);
        return view('kelas.kelas', compact('title', 'data'));
    }

    public function tambah()
    {
        $title = 'Tambah Kelas';
        $jurusan = Jurusan::all();
        return view('kelas.tambah', compact('title', 'jurusan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'id_jurusan' => 'required|exists:jurusans,id'


        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $kelas = new Kelas();
        $kelas->kelas = $request->kelas;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->save();
        // Kelas::create($request->all());
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('kelas')->with('success', 'Data berhasil ditambahkan');
    }


    public function hapus($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('kelas');
    }

public function edit($id)
    {
        $title = 'Edit Kelas';
        $data = Kelas::find($id);
        $jurusan = Jurusan::all();
        return view('kelas.edit', compact('title', 'data', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'id_jurusan' => 'required|exists:jurusans,id'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $kelas = Kelas::find($id);
        $kelas->kelas = $request->kelas;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->save();
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('kelas');
    }


}
