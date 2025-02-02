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
        // 4. Tabel Orders
        // order_id (INT, Primary Key, Auto Increment)
        // user_id (INT, Foreign Key)
        // order_date (DATETIME)
        // status (ENUM: 'Pending', 'Shipped', 'Delivered', 'Cancelled')
        // total_amount (DECIMAL)
        // shipping_address (TEXT)
        // created_at (DATETIME)
        // updated_at (DATETIME)
        Schema::create('pesanan', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('pesanan_id');
            // foreign key atau kunci asing, relasinya adalah 1 pesanan milik atau dilakukan oleh 1 user dan 1 user memiliki banyak pesanan
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('user_id')->nullable()->constrained('users')
                // referensi column user_id milik table users
                ->references('user_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus users maka semua pesanan terkait nya juga akan terhapus
                ->onDelete('cascade');
            $table->dateTime('tanggal_pemesanan');
            // tipe data enum adalah tipe data yang nilai nya akan memilih beberapa pilihan yang telah ditentukan
            $table->enum('status', ['Tertunda', 'Dikirim', 'Terkirim', 'Dibatalkan']);
            $table->integer('total_harga');
            $table->string('alamat_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
