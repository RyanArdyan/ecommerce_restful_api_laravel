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
        // product_id (INT, Primary Key, Auto Increment)
        // name (VARCHAR)
        // description (TEXT)
        // price (DECIMAL)
        // stock_quantity (INT)
        // category_id (INT, Foreign Key)
        // image_url (VARCHAR)
        Schema::create('produk', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('produk_id');
            // foreign key atau kunci asing, relasinya adalah 1 produk milik 1 kategori dan 1 kategori memiliki banyak produk
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('kategori_id')->nullable()->constrained('kategori')
                // referensi column kategori_id milik table kategori
                ->references('kategori_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus kategori maka semua produk terkait nya juga akan terhapus
                ->onDelete('cascade');
            $table->string('nama_produk')->unique();
            $table->text('deskripsi');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
