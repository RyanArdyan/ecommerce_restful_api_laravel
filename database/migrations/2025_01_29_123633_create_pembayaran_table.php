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
        Schema::create('pembayaran', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('pembayaran_id');
            // foreign key atau kunci asing, relasinya adalah 1 pembayaran milik 1 pesanan dan 1 pesanan memiliki satu pembayaran
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('pesanan_id')->nullable()->constrained('pesanan')
                // referensi column pesanan_id milik table pesanan
                ->references('pesanan_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus pesanan maka semua pembayaran terkait nya juga akan terhapus
                ->onDelete('cascade');
            $table->dateTime('tanggal_pembayaran');
            $table->integer('total_pembayaran');
            $table->enum('metode_pembayaran', ['Kartu Kredit', 'Paypal', 'Transfer Bank']);
            $table->enum('status', ['Tertunda', 'Selesai', 'Gagal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
