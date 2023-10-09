<?php

namespace App\Http\Controllers;

use App\Models\Jumbotron;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JumbotronController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jumbotron = Jumbotron::all();
        return view('back.administrasi.konten.jumbotron.view', compact('jumbotron'));
    }

    public function create()
    {
        return view('back.administrasi.konten.jumbotron.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        $jumbotron = Jumbotron::all();

        if($jumbotron->count('id') == 1){
            Alert::error('Gagal', 'Tidak Dapat Menambahkan Data Lebih Dari Satu');
            return redirect()->route('jumbotron.index');
        }else{
            if(is_null($data['gambar'])){

                Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
                return redirect()->route('jumbotron.create');
            }else{
                $data['gambar'] = $request->file('gambar')->store('jumbotron');

                Jumbotron::create($data);

                Alert::success('Berhasil', 'Data Berhasil Tersimpan');
            }
        }
        return redirect()->route('jumbotron.index');
    }


    public function destroy($id)
    {
        $jumbotron = Jumbotron::find($id);
        $jumbotron->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('jumbotron.index');
    }
}
