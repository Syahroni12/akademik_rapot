<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MapelController extends Controller
{
    public function index()
    {
        $title = 'Mapel';
        $data = Mapel::with('kelas')->where('mapel', 'like', '%' . request('cari') . '%')->orWhereHas('kelas', function ($query) {
            $query->where('kelas', 'like', '%' . request('cari') . '%');
        })

            ->paginate(20);

        return view('mapel.index', compact('title', 'data'));
    }

    public function tambah()
    {
        $title = 'Tambah Mapel';
        $kelas = Kelas::all();
        return view('mapel.tambah', compact('title', 'kelas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_mapel' => 'required|unique:mapels,kd_mapel',
            'mapel' => 'required',
            'id_kelas' => 'required|exists:kelas,id'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }
        $mapel = new Mapel();
        $mapel->kd_mapel = $request->kd_mapel;
        $mapel->mapel = $request->mapel;
        $mapel->id_kelas = $request->id_kelas;
        $mapel->save();
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('mapel');
    }

    public function edit($id)
    {
        $title = 'Edit Mapel';
        $kelas = Kelas::all();
        $mapel = Mapel::find($id);
        return view('mapel.edit', compact('title', 'kelas', 'mapel'));
    }

    public function update(Request $request, $kd_mapel)
    {
        $validator = Validator::make($request->all(), [
            'mapel' => 'required',
            'semester' => 'required',
            'kd_mapel' => 'required|unique:mapels,kd_mapel,' . $kd_mapel . ',kd_mapel',
            'id_kelas' => 'required|exists:kelas,id'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error('Gagal', $messages);
            return back()->withErrors($validator)->withInput();
        }

        $mapel = Mapel::where('kd_mapel', $kd_mapel)->first();
        if (!$mapel) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->route('mapel');
        }

        $mapel->kd_mapel = $request->kd_mapel;
        $mapel->mapel = $request->mapel;
        $mapel->id_kelas = $request->id_kelas;
        $mapel->semester = $request->semester;
        $mapel->save();

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('mapel');
    }

    public function hapus($kd_mapel)
    {

        $mapel = Mapel::where('kd_mapel', $kd_mapel)->first();
        $mapel->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('mapel');
    }
}
