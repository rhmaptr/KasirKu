<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
        public function index() {
            $pengguna = Pengguna::all();
            return view('pengguna', compact('pengguna'));
        }
        

    public function create()
    {
        return view('tambah_pengguna');
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'akses' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Simpan data ke database
        Pengguna::create([
            'akses' => $request->akses,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

        public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('edit_pengguna', compact('pengguna'));
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pelanggan')->with('success', 'pelanggan berhasil dihapus!');
    }

        public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $pengguna->nama = $request->nama;
        $pengguna->harga = $request->harga;
        $pengguna->stok = $request->stok;

        $pengguna->save();

        return redirect()->route('pengguna')->with('success', 'pelanggan berhasil diperbarui!');
    }

}
