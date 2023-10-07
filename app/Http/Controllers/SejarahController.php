<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SejarahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sejarah = Sejarah::all();
        return view('back.administrasi.konten.profil.sejarah.view', compact('sejarah'));
    }

    public function create()
    {
        return view('back.administrasi.konten.profil.sejarah.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sejarah' => 'required|min:3',
        ]);

        $data = $request->all();
        $sejarah = Sejarah::all();

        if($sejarah->count('id') == 1){
            Alert::error('Gagal', 'Tidak Dapat Menambahkan Data Lebih Dari Satu');
            return redirect()->route('sejarah.index');
        }else{
            if(is_null($data['sejarah'])){

                Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
                return redirect()->route('sejarah.create');
            }else{
                Sejarah::create($data);

                Alert::success('Berhasil', 'Data Berhasil Tersimpan');
            }
        }
        return redirect()->route('sejarah.index');
    }

    public function edit($id)
    {
        $sejarah = Sejarah::find($id);

        return view('back.administrasi.konten.profil.sejarah.edit', compact('sejarah'));
    }

    public function update(Request $request, $id)
    {
        $sejarah = Sejarah::find($id);

        if(empty($request->file('foto'))) {
            $sejarah->update([
                'sejarah' => $request->sejarah,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('sejarah.index');
        } else {
            Storage::delete($sejarah->gambar);
            $sejarah->update([
                'sejarah' => $request->sejarah,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('sejarah.index');
        }

    }
    public function destroy($id)
    {
        $sejarah = Sejarah::find($id);
        $sejarah->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('sejarah.index');
    }
}
