<?php

namespace App\Http\Controllers;

use App\Models\HariNasional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class HariNasionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hari = HariNasional::all();
        return view('back.administrasi.konten.beranda.hari-nasional.view', compact('hari'));
    }

    public function create()
    {
        return view('back.administrasi.konten.beranda.hari-nasional.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_hari' => 'required|min:3',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        $hari = HariNasional::all();
        if($hari->count('id') == 1){
            Alert::error('Gagal', 'Tidak Dapat Menambahkan Data Lebih Dari Satu');
            return redirect()->route('hari.index');
        }else{
            if(is_null($data['nama_hari']) || is_null($data['deskripsi'])){

                Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
                return redirect()->route('hari.create');
            }else{
                $data['gambar'] = $request->file('gambar')->store('hari-nasional');
                HariNasional::create($data);

                Alert::success('Berhasil', 'Data Berhasil Tersimpan');
            }
        }

        return redirect()->route('hari.index');
    }

    public function edit($id)
    {
        $hari = HariNasional::find($id);

        return view('back.administrasi.konten.beranda.hari-nasional.edit', compact('hari'));
    }

    public function update(Request $request, $id)
    {
        $hari = HariNasional::find($id);

        if(empty($request->file('gambar'))) {
            $hari->update([
                'nama_hari' => $request->nama_hari,
                'deskripsi' => $request->deskripsi,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('hari.index');
        } else {
            Storage::delete($hari->gambar);
            $hari->update([
                'nama_hari' => $request->nama_hari,
                'deskripsi' => $request->deskripsi,
                'gambar' => $request->file('gambar')->store('hari-nasional'),
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('hari.index');
        }

    }

    public function destroy($id)
    {
        $hari = HariNasional::find($id);
        $hari->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('hari.index');
    }
}
