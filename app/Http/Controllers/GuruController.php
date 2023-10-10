<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $guru = Guru::orderBy('updated_at', 'desc')->paginate(5);
        return view('back.administrasi.data.guru.view', compact('guru'));
    }

    public function create()
    {
        return view('back.administrasi.data.guru.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3|max:25',
            'jabatan' => 'required|min:3|max:25',
            'foto' => 'mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        if(is_null($data['nama']) || is_null($data['nip']) || is_null($data['jabatan'])){

            Alert::error('Gagal', 'Data Gagal Tersimpan. Periksa kembali data yang dimasukkan');
            return redirect()->route('guru.create');
        }else{
            $data['foto'] = $request->file('foto')->store('guru');
            Guru::create($data);

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('guru.index');
    }

    public function edit($id)
    {
        $guru = Guru::find($id);

        return view('back.administrasi.data.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru= Guru::find($id);

        if(empty($request->file('foto'))) {
            $guru->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('guru.index');
        } else {
            Storage::delete($guru->foto);
            $guru->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'foto' => $request->file('foto')->store('guru'),
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('guru.index');
        }

    }
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('guru.index');
    }
}
