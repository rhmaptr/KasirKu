<?php

use Illuminate\Support\Facades\Route;

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/pengguna', function () {
    return view('pengguna');
});

Route::get('/rekap', function () {
    return view('rekap');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/pelanggan', function () {
    return view('pelanggan');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/tambah_produk', function () {
    return view('tambah_produk');
});

Route::get('/tambah_pengguna', function () {
    return view('tambah_pengguna');
});

Route::get('/tambah_pelanggan', function () {
    return view('tambah_pelanggan');
});

Route::get('/login', function () {
    return view('login');
});