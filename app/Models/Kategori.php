<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // beritahu nama table nya
    protected $table = 'kategori';
    // beritahu nama primary key nya
    protected $primaryKey = 'kategori_id';
    // agar bisa tambah dan perbarui data secara masal
    protected $guarded = [];
}
