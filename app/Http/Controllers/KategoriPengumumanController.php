<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriPengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori_pengumuman = KategoriPengumuman::paginate(5);
        return view('back.administrasi.konten.kategori.kategori-pengumuman.view', compact('kategori_pengumuman'));
    }

    public function create()
    {
        return view('back.administrasi.konten.kategori.kategori-pengumuman.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:4',
        ]);

        $kategori_pengumuman = KategoriPengumuman::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('kategori-pengumuman.index');
    }

    public function edit($id)
    {
        $kategori_pengumuman = KategoriPengumuman::find($id);

        return view('back.administrasi.konten.kategori.kategori-pengumuman.edit', compact('kategori_pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $kategori_pengumuman = KategoriPengumuman::findOrFail($id);
        $kategori_pengumuman->update($data);

        Alert::success('Diubah', 'Data Berhasil Terubah');
        return redirect()->route('kategori-pengumuman.index');
    }

    public function destroy($id)
    {
        $kategori_pengumuman = KategoriPengumuman::find($id);
        $kategori_pengumuman->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('kategori-pengumuman.index');
    }
}
