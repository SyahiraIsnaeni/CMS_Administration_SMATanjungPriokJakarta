<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FasilitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fasilitas = Fasilitas::paginate(5);
        return view('back.administrasi.konten.profil.fasilitas.view', compact('fasilitas'));
    }

    public function create()
    {
        return view('back.administrasi.konten.profil.fasilitas.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        if(is_null($data['foto'])){

            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('fasilitas.create');
        }else{
            $data['foto'] = $request->file('foto')->store('fasilitas');
            Fasilitas::create($data);

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('fasilitas.index');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('fasilitas.index');
    }
}
