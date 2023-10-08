<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatPengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengumuman= Pengumuman::orderBy('updated_at', 'desc')->paginate(10);
        return view('back.administrasi.konten.beranda.pengumuman.view', compact('pengumuman'));
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('riwayat-pengumuman.index');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->update([
            'delete' => 'N'
        ]);

        Alert::info('Dipulihkan', 'Data Berhasil Dipulihkan');
        return redirect()->route('riwayat-pengumuman.index');
    }
}
