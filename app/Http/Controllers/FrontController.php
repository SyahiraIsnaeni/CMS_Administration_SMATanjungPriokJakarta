<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Fasilitas;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\ImagesEkstrakurikuler;
use App\Models\ImagesGaleri;
use App\Models\Jumbotron;
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

        $ekstrakurikuler = Ekstrakurikuler::orderByDesc('updated_at')->get();
        $prestasi = Prestasi::limit(5)->orderByDesc('updated_at')->get();
        $hariNasional = HariNasional::all();
        $jumbotron = Jumbotron::orderByDesc('updated_at')->offset(1)->limit(PHP_INT_MAX)->get();
        $jumbotronActive = Jumbotron::orderByDesc('updated_at')->limit(1)->get();

        $beritaPrioritas = Berita::where('is_active', '1')->limit(1)->orderByDesc('created_at')->get();
        $pengumumanPrioritas = Pengumuman::where('is_active', '1')->limit(1)->orderByDesc('created_at')->get();
        return view('front.beranda', compact('pengumuman','berita', 'blog',
            'ekstrakurikuler', 'prestasi', 'hariNasional', 'beritaPrioritas', 'pengumumanPrioritas', 'jumbotron', 'jumbotronActive'));
    }

    public function profil()
    {
        $sambutan = Sambutan::all();
        $sejarah = Sejarah::all();
        $fasilitas = Fasilitas::orderByDesc('updated_at')->get();
        $struktur = Struktural::all();
        $jumbotron = Jumbotron::orderByDesc('updated_at')->get();

        return view('front.profil', compact('sambutan','sejarah', 'fasilitas',
            'struktur','jumbotron'));
    }

    public function guru_staf()
    {
        $guru = Guru::orderByDesc('updated_at')->get();
        $staf = Staf::orderByDesc('updated_at')->get();
        $jumbotron = Jumbotron::orderByDesc('updated_at')->get();

        return view('front.guru-staf', compact('guru','staf', 'jumbotron'));
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
        $galeri = Galeri::orderByDesc('updated_at')->get();
        $jumbotron = Jumbotron::orderByDesc('updated_at')->get();

        return view('front.galeri', compact('galeri', 'jumbotron'));
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
        $jumbotron = Jumbotron::orderByDesc('updated_at')->get();

        return view('front.daftar-berita', compact('berita', 'jumbotron'));
    }

    public function blog()
    {
        $blog = Blog::where('is_active', '1')->orderByDesc('created_at')->get();
        $jumbotron = Jumbotron::orderByDesc('updated_at')->get();

        return view('front.daftar-blog', compact('blog', 'jumbotron'));
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('is_active', '1')->orderByDesc('created_at')->get();
        $jumbotron = Jumbotron::orderByDesc('updated_at')->get();

        return view('front.daftar-pengumuman', compact('pengumuman', 'jumbotron'));
    }

    public function detailBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $nextBlog = Blog::whereNotIn('slug', [$slug])->where('is_active', '1')->limit(3)->orderByDesc('created_at')->get();

        return view('front.blog', compact('blog', 'nextBlog'));
    }

    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $nextBerita = Berita::whereNotIn('slug', [$slug])->where('is_active', '1')->limit(3)->orderByDesc('created_at')->get();

        return view('front.berita', compact('berita','nextBerita'));
    }

    public function detailPengumuman($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)->first();
        $nextPengumuman = Pengumuman::whereNotIn('slug', [$slug])->where('is_active', '1')->limit(3)->orderByDesc('created_at')->get();

        return view('front.pengumuman', compact('pengumuman','nextPengumuman'));
    }

}
