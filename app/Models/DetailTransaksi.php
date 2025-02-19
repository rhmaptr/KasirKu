<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'nama_produk',
        'harga',
        'jumlah',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
