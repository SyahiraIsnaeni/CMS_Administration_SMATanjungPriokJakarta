<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blog = Blog::orderBy('updated_at', 'desc')->paginate(10);
        return view('back.administrasi.riwayat.blog.view', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('riwayat-blog.index');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $blog->update([
            'delete' => 'N'
        ]);

        Alert::info('Dipulihkan', 'Data Berhasil Dipulihkan');
        return redirect()->route('riwayat-blog.index');
    }
}
