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
        // discount_id (INT, Primary Key, Auto Increment)
        // code (VARCHAR, Unique)
        // description (TEXT)
        // discount_percentage (DECIMAL)
        // start_date (DATETIME)
        // end_date (DATETIME)
        Schema::create('diskon', function (Blueprint $table) {
            // create big integer data type that auto increment and primary key
            $table->bigIncrements('diskon_id');
            $table->string('kode_diskon')->unique();
            $table->text('deskripsi');
            $table->decimal('presentase_diskon');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskon');
    }
};
