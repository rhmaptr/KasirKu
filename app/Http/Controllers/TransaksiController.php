<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        Log::info($produk);
        return view('transaksi', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_hp' => 'required|regex:/^[0-9]{10,15}$/',
            'alamat' => 'required|string|max:255',
            'total_belanja' => 'required|numeric',
            'nominal_uang' => 'required|numeric',
            'kembalian' => 'required|numeric',
            'cart' => 'nullable|array',
        ]);

        $transaksis = Transaksi::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'total_belanja' => $request->total_belanja,
            'nominal_uang' => $request->nominal_uang,
            'kembalian' => $request->kembalian,
            'cart' => json_encode($request->cart ?? []),
            'tanggal_transaksi' => now(),
        ]);
        

        $cartItems = json_decode($request->cart, true);
        foreach ($cartItems as $item) {
            DetailTransaksi::create([
                'transaksi_id' => $transaksis->id,
                'produk_id' => $item['id'],
                'nama_produk' => $item['nama'],
                'harga' => $item['harga'],
                'jumlah' => $item['qty'],
            ]);
        }


        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function simpanTransaksi(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_hp' => 'required|string',
            'alamat' => 'required|string',
            'total_belanja' => 'required|numeric',
            'nominal_uang' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        try {
            // Log the incoming request data for debugging
            Log::info('Permintaan transaksi masuk:', $request->all());

            // Simpan data transaksi
            $transaksis = new Transaksi();
            $transaksis->nama_pelanggan = $request->nama_pelanggan;
            $transaksis->nomor_hp = $request->nomor_hp;
            $transaksis->alamat = $request->alamat;
            $transaksis->total_belanja = $request->total_belanja;
            $transaksis->nominal_uang = $request->nominal_uang;
            $transaksis->kembalian = $request->kembalian;
            $transaksis->cart = json_encode($request->cart);
            $transaksis->save();

            // Uraikan cart dari JSON string
            $cartItems = json_decode($request->cart, true);
            foreach ($cartItems as $item) {
                $detail = new DetailTransaksi();
                $detail->transaksi_id = $transaksis->id;
                $detail->produk_id = $item['id'];
                $detail->nama_produk = $item['nama'];
                $detail->harga = $item['harga'];
                $detail->jumlah = $item['qty'];
                $detail->save();
            }

            return response()->json(['message' => 'Transaksi berhasil disimpan']);
        } catch (\Exception $e) {
            // Log the error message for debugging
            Log::error('Kesalahan saat menyimpan transaksi:', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan transaksi'], 500);
        }
    }

    public function rekap()
    {
        $transaksis = Transaksi::all();
        return view('rekap', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('detailTransaksi')->findOrFail($id);
        return response()->json($transaksi);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('rekap')->with('success', 'Transaksi berhasil dihapus!');
    }
}