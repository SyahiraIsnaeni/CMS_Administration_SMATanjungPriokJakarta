<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengumuman = Pengumuman::orderBy('updated_at', 'desc')->paginate(10);
        return view('back.administrasi.konten.beranda.pengumuman.view', compact('pengumuman'));
    }


    public function create()
    {
        $kategori_pengumuman = KategoriPengumuman::all();
        return view('back.administrasi.konten.beranda.pengumuman.add', compact('kategori_pengumuman'));

    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'judul' => 'required|min:5',
            'dokumen' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
        ]);

        if (
            is_null($data['penulis']) ||
            is_null($data['judul']) ||
            is_null($data['body']) ||
            is_null($data['kategori_pengumuman_id'])
        ) {
            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('pengumuman.create');
        } else {
            $data['slug'] = Str::slug($request->judul);

            // Mengambil nama asli dokumen
            $nama_dokumen_asli = $request->file('dokumen')->getClientOriginalName();
            $nama_gambar_asli = $request->file('gambar')->getClientOriginalName();

            // Menyimpan file dengan nama asli
            $data['dokumen'] = $request->file('dokumen')->storeAs('dokumen_pengumuman', $nama_dokumen_asli);
            $data['gambar'] = $request->file('gambar')->storeAs('pengumuman', $nama_gambar_asli);

            Pengumuman::create($data);

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('pengumuman.index');
    }



    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        $kategori_pengumuman = KategoriPengumuman::all();

        return view('back.administrasi.konten.beranda.pengumuman.edit', compact('pengumuman', 'kategori_pengumuman'));
    }

    public function update(Request $request, $id)
    {
        if(empty($request->file('gambar')) || empty($request->file('dokumen'))) {
            $pengumuman = Pengumuman::find($id);
            $pengumuman->update([
                'penulis' => $request->penulis,
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_pengumuman_id' => $request->kategori_pengumuman_id,
                'is_active' => $request->is_active,
            ]);

            Alert::info('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('pengumuman.index');
        } else {
            $pengumuman = Pengumuman::find($id);
            Storage::delete($pengumuman->gambar);
            Storage::delete($pengumuman->dokumen);
            $nama_dokumen_asli = $request->file('dokumen')->getClientOriginalName();
            $pengumuman->update([
                'penulis' => $request->penulis,
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_pengumuman_id' => $request->kategori_pengumuman_id,
                'is_active' => $request->is_active,
                'gambar' => $request->file('gambar')->store('pengumuman'),
                'dokumen' => $request->file('dokumen')->storeAs('dokumen_pengumuman', $nama_dokumen_asli)
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('pengumuman.index');
        }
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->update([
            'delete' => 'Y'
        ]);

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('pengumuman.index');
    }
}
