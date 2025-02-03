<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    public function index()
    {
        $title = 'Jurusan';
        $data = Jurusan::where('jurusan', 'like', '%' . request('cari') . '%')->paginate(20);
        return view('jurusan', compact('title', 'data'));
    }
    public function tambah(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'jurusan' => 'required',


        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $jurusan = new Jurusan();
        $jurusan->jurusan = $request->jurusan;
        $jurusan->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('jurusan');
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jurusan' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $jurusan = Jurusan::find($request->id);
        $jurusan->jurusan = $request->jurusan;
        $jurusan->save();
        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('jurusan');
    }


    public function hapus($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('jurusan');
    }
}
