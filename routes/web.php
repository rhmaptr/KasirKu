<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProdukController;
use App\Models\Produk;
use Illuminate\Http\Request;

Route::get('/produk', function () {
    $produk = Produk::all()->map(function ($item) {
        return [
            'id' => $item->id,
            'kode' => $item->kode,
            'nama' => $item->nama,
            'harga' => $item->harga,
            'stok' => $item->stok,
            'foto' => $item->foto ? asset('storage/' . $item->foto) : null
        ];
    });

    return response()->json($produk);
});

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/tambah_produk', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');

Route::get('/beranda', function () {
    return view('beranda');
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk admin dan kasir
Route::middleware([RoleMiddleware::class . ':admin,kasir'])->group(function () {
    Route::get('/beranda', function () {
        return view('beranda');
    });

    Route::get('/transaksi', function () {
        return view('transaksi');
    });

    Route::get('/pelanggan', function () {
        return view('pelanggan');
    });

    Route::get('/produk', function () {
        return view('produk');
    });

    Route::get('/rekap', function () {
        return view('rekap');
    });
});

// Middleware khusus admin
Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/pengguna', function () {
        return view('pengguna');
    });
});
