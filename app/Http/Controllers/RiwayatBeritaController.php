<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatBeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $berita = Berita::orderBy('updated_at', 'desc')->paginate(10);
        return view('back.administrasi.konten.beranda.berita.view', compact('berita'));
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('riwayat-berita.index');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        $berita->update([
            'delete' => 'N'
        ]);

        Alert::info('Dipulihkan', 'Data Berhasil Dipulihkan');
        return redirect()->route('riwayat-berita.index');
    }
}
