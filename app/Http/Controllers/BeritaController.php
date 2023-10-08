<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $berita = Berita::orderBy('updated_at', 'desc')->paginate(10);
        return view('back.administrasi.konten.beranda.berita.view', compact('berita'));
    }


    public function create()
    {
        $kategori_berita = KategoriBerita::all();
        return view('back.administrasi.konten.beranda.berita.add', compact('kategori_berita'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'judul' => 'required|min:5',
        ]);

        $data = $request->all();
        if(is_null($data['penulis']) || is_null($data['judul']) || is_null($data['body']) || is_null($data['kategori_berita_id'])){

            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('berita.create');
        }else{
            $data['slug'] = Str::slug($request->judul);
            $data['gambar'] = $request->file('gambar')->store('berita');

            Berita::create($data);

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('berita.index');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori_berita = KategoriBerita::all();

        return view('back.administrasi.konten.beranda.berita.edit', compact('berita', 'kategori_berita'));
    }

    public function update(Request $request, $id)
    {
        if(empty($request->file('gambar'))) {
            $berita = Berita::find($id);
            $berita->update([
                'penulis' => $request->penulis,
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_berita_id' => $request->kategori_berita_id,
                'is_active' => $request->is_active,
            ]);

            Alert::info('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('berita.index');
        } else {
            $berita = Berita::find($id);
            Storage::delete($berita->gambar);
            $berita->update([
                'penulis' => $request->penulis,
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_berita_id' => $request->kategori_berita_id,
                'is_active' => $request->is_active,
                'gambar' => $request->file('gambar')->store('berita'),
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('berita.index');
        }
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->update([
            'delete' => 'Y'
        ]);

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('berita.index');
    }
}
