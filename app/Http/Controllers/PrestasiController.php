<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PrestasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $prestasi = Prestasi::orderBy('updated_at', 'desc')->paginate(5);
        return view('back.administrasi.konten.beranda.prestasi.view', compact('prestasi'));
    }

    public function create()
    {
        return view('back.administrasi.konten.beranda.prestasi.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3|max:25',
            'nama_prestasi' => 'required|min:3|max:70',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        if(is_null($data['nama']) || is_null($data['nama_prestasi']) || is_null($data['foto'])){

            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('prestasi.create');
        }else{
            $data['foto'] = $request->file('foto')->store('prestasi');
            Prestasi::create($data);

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('prestasi.index');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::find($id);

        return view('back.administrasi.konten.beranda.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi= Prestasi::find($id);

        if(empty($request->file('foto'))) {
            $prestasi->update([
                'nama' => $request->nama,
                'nama_prestasi' => $request->nama_prestasi,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('prestasi.index');
        } else {
            Storage::delete($prestasi->foto);
            $prestasi->update([
                'nama' => $request->nama,
                'nama_prestasi' => $request->nama_prestasi,
                'foto' => $request->file('foto')->store('prestasi'),
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('prestasi.index');
        }

    }
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);
        $prestasi->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('prestasi.index');
    }
}
