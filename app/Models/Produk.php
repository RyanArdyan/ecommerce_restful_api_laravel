<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // beri tau nama table nya
    protected $table = 'produk';
    // beri tau primary key nya 
    protected $primaryKey = 'produk_id';
    // agar bisa tambah dan update data secara masal
    protected $guarded = [];
}
