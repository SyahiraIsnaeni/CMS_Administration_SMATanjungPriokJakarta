<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HariNasionalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'revalidate'], function(){
    Route::resource('hari', HariNasionalController::class);
    Route::resource('ekstrakurikuler', \App\Http\Controllers\EkstrakurikulerController::class);
    Route::resource('prestasi', \App\Http\Controllers\PrestasiController::class);
    Route::resource('fasilitas', \App\Http\Controllers\FasilitasController::class);
    Route::resource('sambutan', \App\Http\Controllers\SambutanController::class);
    Route::resource('sejarah', \App\Http\Controllers\SejarahController::class);
    Route::resource('struktural', \App\Http\Controllers\StrukturalController::class);
    Route::resource('kategori-berita', \App\Http\Controllers\KategoriBeritaController::class);
    Route::resource('kategori-pengumuman', \App\Http\Controllers\KategoriPengumumanController::class);
    Route::resource('kategori-blog', \App\Http\Controllers\KategoriBlogController::class);
    Route::resource('berita', \App\Http\Controllers\BeritaController::class);
    Route::resource('blog', \App\Http\Controllers\BlogController::class);
    Route::resource('pengumuman', \App\Http\Controllers\PengumumanController::class);
    Route::resource('riwayat-berita', \App\Http\Controllers\RiwayatBeritaController::class);
    Route::resource('riwayat-blog', \App\Http\Controllers\RiwayatBlogController::class);
    Route::resource('riwayat-pengumuman', \App\Http\Controllers\RiwayatPengumumanController::class);
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    Route::resource('guru', \App\Http\Controllers\GuruController::class);
    Route::resource('staf', \App\Http\Controllers\StafController::class);
    Route::resource('galeri', \App\Http\Controllers\GaleriController::class);
    Route::resource('jumbotron', \App\Http\Controllers\JumbotronController::class);
});

require __DIR__.'/auth.php';

Route::get('/', [\App\Http\Controllers\FrontController::class, 'index'])->name('beranda');
Route::get('/profil', [\App\Http\Controllers\FrontController::class, 'profil'])->name('profil');
Route::get('/guru-staf', [\App\Http\Controllers\FrontController::class, 'guru_staf'])->name('guru-staf');
Route::get('/prestasi-sekolah', [\App\Http\Controllers\FrontController::class, 'prestasi'])->name('prestasi');
Route::get('/galeri-sekolah', [\App\Http\Controllers\FrontController::class, 'galeri'])->name('galeri');
Route::get('/detail-galeri/{id}', [\App\Http\Controllers\FrontController::class, 'detailGaleri'])->name('detail-galeri');
Route::get('/detail-ekstrakurikuler/{id}', [\App\Http\Controllers\FrontController::class, 'ekstrakurikuler'])->name('detail-ekstrakurikuler');
Route::get('/daftar-berita', [\App\Http\Controllers\FrontController::class, 'berita'])->name('berita');
Route::get('/daftar-blog', [\App\Http\Controllers\FrontController::class, 'blog'])->name('blog');
Route::get('/daftar-pengumuman', [\App\Http\Controllers\FrontController::class, 'pengumuman'])->name('pengumuman');
Route::get('/detail-blog/{id}', [\App\Http\Controllers\FrontController::class, 'detailBlog'])->name('detail-blog');
Route::get('/detail-berita/{id}', [\App\Http\Controllers\FrontController::class, 'detailBerita'])->name('detail-berita');
Route::get('/detail-pengumuman/{id}', [\App\Http\Controllers\FrontController::class, 'detailPengumuman'])->name('detail-pengumuman');

Route::get('/front-berita', function () {
    return view('front.berita');
});
Route::get('/front-blog', function () {
    return view('front.blog');
});

Route::get('/front-daftar-blog', function () {
    return view('front.daftar-blog');
});
Route::get('/front-daftar-pengumuman', function () {
    return view('front.daftar-pengumuman');
});
Route::get('/front-pengumuman', function () {
    return view('front.pengumuman');
});
