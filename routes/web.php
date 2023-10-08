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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
});

require __DIR__.'/auth.php';
