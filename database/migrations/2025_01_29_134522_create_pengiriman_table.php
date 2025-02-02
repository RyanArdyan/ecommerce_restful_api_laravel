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
        // shipping_id (INT, Primary Key, Auto Increment)
        // order_id (INT, Foreign Key)
        // shipping_method (VARCHAR)
        // tracking_number (VARCHAR)
        // shipping_date (DATETIME)
        // delivery_date (DATETIME)
        // created_at (DATETIME)
        // updated_at (DATETIME)
        Schema::create('pengiriman', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('pengiriman_id');
            // foreign key atau kunci asing, relasinya adalah 1 pengiriman milik 1 pesanan dan 1 pesanan memiliki banyak pengiriman
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('pesanan_id')->nullable()->constrained('pesanan')
                // referensi column pesanan_id milik table pesanan
                ->references('pesanan_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus pesanan maka semua pengiriman terkait nya juga akan terhapus
                ->onDelete('cascade');
            $table->string('metode_pengiriman');
            $table->string('nomor_pelacakan');
            $table->dateTime('tanggal_pengiriman');
            $table->dateTime('tanggal_pengantaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
