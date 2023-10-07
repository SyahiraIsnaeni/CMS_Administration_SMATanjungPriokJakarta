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

Route::get('/dashboard', function () {
    return view('back.administrasi.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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
});

require __DIR__.'/auth.php';
