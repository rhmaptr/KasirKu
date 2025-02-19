<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{

    // public function panggil(): JsonResponse|mixed
    // {
    //     return response()->json(Pelanggan::all());
    // }

        public function index() {
            $pelanggan = Pelanggan::all();
            return view('pelanggan', compact('pelanggan'));
        }
        

    public function create()
    {
        return view('tambah_pelanggan');
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        // Simpan data ke database
        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        // Pelanggan::create($request->all());
        return redirect()->route('pelanggan')->with('success', 'pelanggan berhasil ditambahkan!');
    }

        public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('edit_pelanggan', compact('pelanggan')); // Buat file edit.blade.php nanti
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan')->with('success', 'pelanggan berhasil dihapus!');
    }

        public function update(Request $request, $id)
    {
        $pelanggan = pelanggan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->no_hp;

        $pelanggan->save();

        return redirect()->route('pelanggan')->with('success', 'pelanggan berhasil diperbarui!');
    }

}
