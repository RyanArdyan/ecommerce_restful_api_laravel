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
        // wishlist_id (INT, Primary Key, Auto Increment)
        // user_id (INT, Foreign Key)
        // product_id (INT, Foreign Key)
        Schema::create('daftar_keinginan', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('daftar_keinginan_id');
            // foreign key atau kunci asing, relasinya adalah 1 daftar keinginan milik 1 user dan 1 user memiliki banyak daftar keinginan
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('user_id')->nullable()->constrained('users')
                // referensi column user_id milik table user
                ->references('user_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus user maka semua daftar keinginan terkait nya juga akan terhapus
                ->onDelete('cascade');
            // foreign key atau kunci asing, relasinya adalah 1 daftar keinginan milik 1 produk dan 1 produk memiliki banyak daftar keinginan
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('produk_id')->nullable()->constrained('produk')
                // referensi column produk_id milik table produk
                ->references('produk_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus produk maka semua daftar keinginan terkait nya juga akan terhapus
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_keinginan');
    }
};
