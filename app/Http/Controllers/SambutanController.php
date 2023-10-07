<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SambutanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sambutan = Sambutan::all();
        return view('back.administrasi.konten.profil.sambutan.view', compact('sambutan'));
    }

    public function create()
    {
        return view('back.administrasi.konten.profil.sambutan.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sambutan' => 'required|min:3',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        $sambutan = Sambutan::all();

        if($sambutan->count('id') == 1){
            Alert::error('Gagal', 'Tidak Dapat Menambahkan Data Lebih Dari Satu');
            return redirect()->route('sambutan.index');
        }else{
            if(is_null($data['sambutan']) || is_null($data['foto'])){

                Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
                return redirect()->route('sambutan.create');
            }else{
                $data['foto'] = $request->file('foto')->store('sambutan');

                Sambutan::create($data);

                Alert::success('Berhasil', 'Data Berhasil Tersimpan');
            }
        }
        return redirect()->route('sambutan.index');
    }

    public function edit($id)
    {
        $sambutan = Sambutan::find($id);

        return view('back.administrasi.konten.profil.sambutan.edit', compact('sambutan'));
    }

    public function update(Request $request, $id)
    {
        $sambutan = Sambutan::find($id);

        if(empty($request->file('foto'))) {
            $sambutan->update([
                'sambutan' => $request->sambutan,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('sambutan.index');
        } else {
            Storage::delete($sambutan->gambar);
            $sambutan->update([
                'sambutan' => $request->sambutan,
                'foto' => $request->file('foto')->store('sambutan'),
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('sambutan.index');
        }

    }
    public function destroy($id)
    {
        $sambutan = Sambutan::find($id);
        $sambutan->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('sambutan.index');
    }
}
