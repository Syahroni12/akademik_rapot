<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
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
}
