<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriBeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori_berita = KategoriBerita::paginate(5);
        return view('back.administrasi.kategori.kategori-berita.view', compact('kategori_berita'));
    }

    public function create()
    {
        return view('back.administrasi.kategori.kategori-berita.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:4',
        ]);

        $kategori_berita = KategoriBerita::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('kategori-berita.index');
    }

    public function edit($id)
    {
        $kategori_berita = KategoriBerita::find($id);

        return view('back.administrasi.kategori.kategori-berita.edit', compact('kategori_berita'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $kategori_berita = KategoriBerita::findOrFail($id);
        $kategori_berita->update($data);

        Alert::success('Diubah', 'Data Berhasil Terubah');
        return redirect()->route('kategori-berita.index');
    }

    public function destroy($id)
    {
        $kategori_berita = KategoriBerita::find($id);
        $kategori_berita->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('kategori-berita.index');
    }
}
