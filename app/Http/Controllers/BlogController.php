<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blog = Blog::orderBy('updated_at', 'desc')->paginate(10);
        return view('back.administrasi.konten.beranda.blog.view', compact('blog'));
    }


    public function create()
    {
        $kategori_blog = KategoriBlog::all();
        return view('back.administrasi.konten.beranda.blog.add', compact('kategori_blog'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'judul' => 'required|min:5',
        ]);

        $data = $request->all();
        if(is_null($data['penulis']) || is_null($data['judul']) || is_null($data['body']) || is_null($data['kategori_blog_id'])){

            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('blog.create');
        }else{
            $data['slug'] = Str::slug($request->judul);
            $data['gambar'] = $request->file('gambar')->store('blog');

            Blog::create($data);

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('blog.index');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $kategori_blog = KategoriBlog::all();

        return view('back.administrasi.konten.beranda.blog.edit', compact('blog', 'kategori_blog'));
    }

    public function update(Request $request, $id)
    {
        if(empty($request->file('gambar'))) {
            $blog= Blog::find($id);
            $blog->update([
                'penulis' => $request->penulis,
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_blog_id' => $request->kategori_blog_id,
                'is_active' => $request->is_active,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('blog.index');
        } else {
            $blog = Blog::find($id);
            Storage::delete($blog->gambar);
            $blog->update([
                'penulis' => $request->penulis,
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_blog_id' => $request->kategori_blog_id,
                'is_active' => $request->is_active,
                'gambar' => $request->file('gambar')->store('blog'),
            ]);

            Alert::info('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('blog.index');
        }
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->update([
            'delete' => 'Y'
        ]);

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('blog.index');
    }
}
