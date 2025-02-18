<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KategoriCollection extends ResourceCollection
{
    /**
     * Transformasi sumber daya koleksi ke dalam sebuah array
     *
     * @return array<int|string, mixed>
     */
    // fungsi collection adalah untuk mengembalikkan daftar data dalam bentuk json
    public function toArray(Request $request): array
    {
        // kembalikkan data berupa json array
        return [
            // kunci meta berisi informasi lain-lain
            'meta' => [
                // berisi total data
                // berisi $ini->koleksi->jumlah
                'total' => $this->collection->count()
            ],
            // kunci data berisi $ini->semua_koleksi yaitu semua data table kategori
            'data' => $this->collection
        ];
    }
}
