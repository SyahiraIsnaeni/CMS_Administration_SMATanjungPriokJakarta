<?php

namespace App\Http\Controllers;

use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StafController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $staf = Staf::orderBy('updated_at', 'desc')->paginate(5);
        return view('back.administrasi.data.staf.view', compact('staf'));
    }

    public function create()
    {
        return view('back.administrasi.data.staf.add');
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
            return redirect()->route('staf.create');
        }else{
            $data['foto'] = $request->file('foto')->store('staf');
            Staf::create($data);

            Alert::success('Berhasil', 'Data Berhasil Tersimpan');
        }

        return redirect()->route('staf.index');
    }

    public function edit($id)
    {
        $staf = Staf::find($id);

        return view('back.administrasi.data.staf.edit', compact('staf'));
    }

    public function update(Request $request, $id)
    {
        $staf = Staf::find($id);

        if(empty($request->file('foto'))) {
            $staf->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('staf.index');
        } else {
            Storage::delete($staf->foto);
            $staf->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'foto' => $request->file('foto')->store('staf'),
            ]);

            Alert::success('Diubah', 'Data Berhasil Terubah');
            return redirect()->route('staf.index');
        }

    }
    public function destroy($id)
    {
        $staf = Staf::find($id);
        $staf->delete();

        Alert::success('Dihapus', 'Data Berhasil Terhapus');
        return redirect()->route('staf.index');
    }
}
