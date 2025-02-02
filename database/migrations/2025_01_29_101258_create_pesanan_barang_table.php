<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_barang', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('pesanan_barang_id');
            // foreign key atau kunci asing, relasinya adalah 1 pesanan barang milik 1 pesanan dan 1 pesanan memiliki banyak pesanan barang
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('pesanan_id')->nullable()->constrained('pesanan')
                // referensi column pesanan_id milik table pesanan
                ->references('pesanan_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus pesanan maka semua pesanan barang terkait nya juga akan terhapus
                ->onDelete('cascade');
            // foreign key atau kunci asing, relasinya adalah 1 pesanan barang milik 1 produk dan 1 produk memiliki banyak pesanan barang
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('produk_id')->nullable()->constrained('produk')
                // referensi column produk_id milik table produk
                ->references('produk_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus produk maka semua pesanan barang terkait nya juga akan terhapus
                ->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('harga_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_barang');
    }
};
