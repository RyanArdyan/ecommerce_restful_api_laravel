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
        Schema::create('kategori', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('kategori_id');
            $table->string('nama_kategori')->unique();
            // foreign key atau kunci asing, relasinya adalah 1 sub kategori milik 1 kategori dan 1 kategori memiliki banyak sub kategori
            // buat foreign key
            // foreign artinya asing, constrained artinya dibatasi
            $table->foreignId('parent_id')->nullable()->constrained('kategori')
                // referensi column kategori_id milik table kategori
                ->references('kategori_id')
                ->onUpdate('cascade')
                // ketika di hapus mengalir, jadi jika aku hapus kategori maka semua sub kategori terkait nya juga akan terhapus
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
