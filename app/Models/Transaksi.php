<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'nama_pelanggan',
        'nomor_hp',
        'alamat',
        'total_belanja',
        'nominal_uang',
        'kembalian',
        'tanggal_transaksi',
        'cart'
    ];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
