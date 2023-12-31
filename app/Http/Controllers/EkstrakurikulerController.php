<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\ImagesEkstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EkstrakurikulerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('updated_at', 'desc')->paginate(5);

        // Mengambil data gambar terkait untuk setiap Ekstrakurikuler
        foreach ($ekstrakurikuler as $ekstra) {
            $ekstra->image = ImagesEkstrakurikuler::where('ekstrakurikuler_id', $ekstra->id)->get();
        }

        return view('back.administrasi.konten.beranda.ekstrakurikuler.view', compact('ekstrakurikuler'));
    }


    public function create()
    {
        return view('back.administrasi.konten.beranda.ekstrakurikuler.add');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3|max:15',
            'deskripsi' => 'required|min:10',
            'logo' => 'required|image|mimes:jpeg,jpg,png',
            'image.*' => 'image|mimes:jpeg,jpg,png',
        ]);

        // Mendapatkan jumlah gambar yang diunggah
        $imageCount = count($request->file('image'));

        if ($imageCount > 3) {
            Alert::error('Gagal', 'Jumlah gambar yang diunggah tidak boleh lebih dari 3.');
            return redirect()->route('ekstrakurikuler.create');
        }

        $data = $request->all();

        if (is_null($data['nama']) || is_null($data['deskripsi']) || is_null($data['logo']) || empty($data['image'])) {
            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('ekstrakurikuler.create');
        } else {
            $data['logo'] = $request->file('logo')->store('ekstrakurikuler');
            $ekstrakurikuler = Ekstrakurikuler::create($data);

            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('images_ekstrakurikuler');
                ImagesEkstrakurikuler::create([
                    'ekstrakurikuler_id' => $ekstrakurikuler->id,
                    'image' => $imagePath,
                ]);
            }

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('ekstrakurikuler.index');
    }



    public function edit($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($id);

        return view('back.administrasi.konten.beranda.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($id);

        if(empty($request->file('logo'))) {
            $ekstrakurikuler->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('ekstrakurikuler.index');
        } else {
            Storage::delete($ekstrakurikuler->logo);
            $ekstrakurikuler->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'logo' => $request->file('logo')->store('ekstrakurikuler'),
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('ekstrakurikuler.index');
        }

    }

    public function destroy($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($id);
        $ekstrakurikuler->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('ekstrakurikuler.index');
    }
}
