<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// sebuah resource digunakan untuk mengembalikkan detail data
class KategoriResource extends JsonResource
{
    /**
     * Transformasi sumber daya nya ke dalam bentuk array
     *
     * @return array<string, mixed>
     */
    // method toArray, parameter Permintaan $permintaan akan menerima inputan user
    public function toArray(Request $request): array
    {
        // kembalikan tanggapan berupa json berupa array
        return [
            // index pesan berisi string sukses
            'message' => 'success',
            // index kategori_id berisi nilai input name="kategori_id"
            'kategori_id' => $request->kategori_id,
            'nama_kategori' => $request->nama_kategori
        ];
    }
}
