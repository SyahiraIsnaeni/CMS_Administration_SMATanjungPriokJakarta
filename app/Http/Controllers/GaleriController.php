<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\ImagesGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $galeri = Galeri::paginate(10);
        return view('back.administrasi.galeri.view', compact('galeri'));
    }

    public function create()
    {
        return view('back.administrasi.galeri.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cover' => 'required|image|mimes:jpeg,jpg,png',
            'image.*' => 'image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();

        if (is_null($data['cover']) || is_null($data['judul']) || empty($data['image'])) {
            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('galeri.create');
        } else {
            $data['cover'] = $request->file('cover')->store('galeri');
            $galeri = Galeri::create($data);

            // Menggunakan id dari galeri yang baru saja dibuat
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('images_galeri');
                ImagesGaleri::create([
                    'galeri_id' => $galeri->id,
                    'image' => $imagePath,
                ]);
            }

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('galeri.index');
    }


    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $images = ImagesGaleri::where('galeri_id', $id);
        $galeri->delete();
        $images->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('galeri.index');
    }
}
