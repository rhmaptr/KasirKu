<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BerandaController;
use App\Models\Produk;
use Illuminate\Http\Request;

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/tambah_produk', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/tambah_pengguna', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('/penguna', [PenggunaController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');

Route::get('/rekap', [TransaksiController::class, 'rekap'])->name('rekap');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::post('/simpan-transaksi', [TransaksiController::class, 'simpanTransaksi'])->name('simpan-transaksi');
Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
Route::get('/tambah_pelanggan', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

Route::get('/tambah_pengguna', function () {
    return view('tambah_pengguna');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk admin dan kasir
Route::middleware([RoleMiddleware::class . ':admin,kasir'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/rekap', [TransaksiController::class, 'rekap'])->name('rekap');
});

// Middleware khusus admin
Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/pengguna', function () {
        return view('pengguna');
    });
});

Route::post('/update-stok', function (Request $request) {
    $produk = Produk::find($request->id);
    if ($produk) {
        $produk->stok += $request->change;
        $produk->save();

        return response()->json(['success' => true, 'stok' => $produk->stok]);
    }
    return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan']);
});
