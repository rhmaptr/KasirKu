<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PembayaranController extends Controller
{
    public function index() {
        $pelanggan = Pelanggan::all();
        return view('pembayaran', compact('pelanggan'));
    }
}