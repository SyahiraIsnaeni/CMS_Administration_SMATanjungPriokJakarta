<?php

namespace App\Http\Controllers;

use App\Models\KategoriBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori_blog = KategoriBlog::orderBy('updated_at', 'desc')->paginate(5);
        return view('back.administrasi.konten.kategori.kategori-blog.view', compact('kategori_blog'));
    }

    public function create()
    {
        return view('back.administrasi.konten.kategori.kategori-blog.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:4',
        ]);

        $kategori_blog = KategoriBlog::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        return redirect()->route('kategori-blog.index');
    }

    public function edit($id)
    {
        $kategori_blog = KategoriBlog::find($id);

        return view('back.administrasi.konten.kategori.kategori-blog.edit', compact('kategori_blog'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $kategori_blog = KategoriBlog::findOrFail($id);
        $kategori_blog->update($data);

        Alert::success('Diubah', 'Data Berhasil Terubah');
        return redirect()->route('kategori-blog.index');
    }

    public function destroy($id)
    {
        $kategori_blog = KategoriBlog::find($id);
        $kategori_blog->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('kategori-blog.index');
    }
}
