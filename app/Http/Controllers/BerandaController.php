<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class BerandaController extends Controller
{
    public function index() {
        $produk = Produk::orderBy('stok', 'desc')->get();
        return view('beranda', compact('produk'));
    }
}
