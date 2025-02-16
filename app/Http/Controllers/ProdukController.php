<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
        public function index() {
            $produk = Produk::all();
            dd($produk);
            return view('produk', compact('produk'));
        }
        

    public function create()
    {
        return view('tambah_produk');
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'kode' => 'required|integer',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|between:0,999999.999999',
            'stok' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan foto
        $fotoPath = $request->file('foto')->store('produk', 'public');

        // Simpan data ke database
        Produk::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $fotoPath
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

        public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('edit_produk', compact('produk')); // Buat file edit.blade.php nanti
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus foto dari storage kalau ada
        if ($produk->foto) {
            Storage::delete('public/' . $produk->foto);
        }

        $produk->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus!');
    }

        public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        // Jika ada foto baru, update
        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::delete('public/' . $produk->foto);
            }
            $path = $request->file('foto')->store('produk', 'public');
            $produk->foto = $path;
        }

        $produk->save();

        return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui!');
    }

}
