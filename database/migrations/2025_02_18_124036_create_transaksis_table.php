<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('nomor_hp');
            $table->string('alamat');
            $table->decimal('total_belanja', 15, 2);
            $table->decimal('nominal_uang', 15, 2);
            $table->decimal('kembalian', 15, 2);
            $table->json('cart'); 
            $table->timestamp('tanggal_transaksi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};