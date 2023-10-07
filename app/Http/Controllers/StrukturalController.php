<?php

namespace App\Http\Controllers;

use App\Models\Struktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;
use RealRashid\SweetAlert\Facades\Alert;

class StrukturalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $struktural = Struktural::all();
        return view('back.administrasi.konten.profil.struktural.view', compact('struktural'));
    }

    public function create()
    {
        return view('back.administrasi.konten.profil.struktural.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        $struktural = Struktural::all();

        if($struktural->count('id') == 1){
            Alert::error('Gagal', 'Tidak Dapat Menambahkan Data Lebih Dari Satu');
            return redirect()->route('struktural.index');
        }else{
            if(is_null($data['gambar'])){

                Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
                return redirect()->route('struktural.create');
            }else{
                $data['gambar'] = $request->file('gambar')->store('struktural');

                Struktural::create($data);

                Alert::success('Berhasil', 'Data Berhasil Tersimpan');
            }
        }
        return redirect()->route('struktural.index');
    }


    public function destroy($id)
    {
        $struktural = Struktural::find($id);
        $struktural->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('struktural.index');
    }
}
