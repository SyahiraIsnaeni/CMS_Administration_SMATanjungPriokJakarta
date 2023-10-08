<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Berita;
use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengumuman = Pengumuman::all()->sortByDesc('updated_at');
        $berita = Berita::all()->sortByDesc('updated_at');
        $blog= Blog::all()->sortByDesc('updated_at');

        $drafPengumuman = Pengumuman::where('is_active', '0')->get();
        $drafBerita = Berita::where('is_active', '0')->get();
        $drafBlog = Blog::where('is_active', '0')->get();

        return view('back.administrasi.dashboard', compact('pengumuman','berita', 'blog', 'drafBerita', 'drafPengumuman', 'drafBlog'));
    }
}
