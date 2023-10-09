<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\HariNasional;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Berita;

class FrontController extends Controller
{
    public function index()
    {
        $blog = Blog::where('is_active', '1')->limit(7)->orderByDesc('created_at')->get();
        $berita = Berita::where('is_active', '1')->limit(4)->orderByDesc('created_at')->get();
        $pengumuman = Pengumuman::where('is_active', '1')->limit(5)->orderByDesc('created_at')->get();

        $ekstrakurikuler = Ekstrakurikuler::orderByDesc('created_at')->get();
        $prestasi = Prestasi::limit(5)->orderByDesc('created_at')->get();
        $hariNasional = HariNasional::all();

        $beritaPrioritas = Berita::where('is_active', '1')->limit(1)->orderByDesc('created_at')->get();
        $pengumumanPrioritas = Pengumuman::where('is_active', '1')->limit(1)->orderByDesc('created_at')->get();
        return view('front.beranda', compact('pengumuman','berita', 'blog',
            'ekstrakurikuler', 'prestasi', 'hariNasional', 'beritaPrioritas', 'pengumumanPrioritas'));
    }
}
