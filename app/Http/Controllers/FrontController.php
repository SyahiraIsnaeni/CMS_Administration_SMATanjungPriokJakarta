<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Fasilitas;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\ImagesEkstrakurikuler;
use App\Models\ImagesGaleri;
use App\Models\Staf;
use App\Models\HariNasional;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Sambutan;
use App\Models\Sejarah;
use App\Models\Struktural;
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

    public function profil()
    {
        $sambutan = Sambutan::all();
        $sejarah = Sejarah::all();
        $fasilitas = Fasilitas::all();
        $struktur = Struktural::all();

        return view('front.profil', compact('sambutan','sejarah', 'fasilitas',
            'struktur'));
    }

    public function guru_staf()
    {
        $guru = Guru::orderByDesc('created_at')->get();
        $staf = Staf::orderByDesc('created_at')->get();

        return view('front.guru-staf', compact('guru','staf'));
    }

    public function prestasi()
    {
        $prestasi = Prestasi::orderByDesc('created_at')->get();

        return view('front.prestasi', compact('prestasi'));
    }

    public function ekstrakurikuler($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::where('id', $id)->first();

        // Mengambil data gambar terkait untuk Ekstrakurikuler
        $ekstrakurikuler->image = ImagesEkstrakurikuler::where('ekstrakurikuler_id', $id)->get();

        return view('front.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    public function galeri()
    {
        $galeri = Galeri::orderByDesc('created_at')->get();

        return view('front.galeri', compact('galeri'));
    }

    public function detailGaleri($id)
    {
        $galeri = Galeri::where('id', $id)->first();

        // Mengambil data gambar terkait untuk Ekstrakurikuler
        $galeri->image = ImagesGaleri::where('galeri_id', $id)->get();

        return view('front.detail-galeri', compact('galeri'));
    }

    public function berita()
    {
        $berita = Berita::where('is_active', '1')->orderByDesc('created_at')->get();

        return view('front.daftar-berita', compact('berita'));
    }

    public function blog()
    {
        $blog = Blog::where('is_active', '1')->orderByDesc('created_at')->get();

        return view('front.daftar-blog', compact('blog'));
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('is_active', '1')->orderByDesc('created_at')->get();

        return view('front.daftar-pengumuman', compact('pengumuman'));
    }


}
