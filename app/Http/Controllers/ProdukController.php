<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProdukRequest;
use App\Models\Produk;

class ProdukController extends Controller
{

    // valdiasi dilakukan oleh StoreProdukRequest di parameter
    // $request berisi value input name yabg 
    public function store(StoreProdukRequest $request)
    {   
        // simpan gambar 
        // berisi value input name="gambar", simpan dalam folder public/gambar_produk
        $nama_gambar = $request->file('gambar')->store('gambar_produk', 'public');

        // simpan produk
        $detail_produk = Produk::create([
            // column kategori_id berisi value input name="kategori_id
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'gambar' => $nama_gambar,
        ]);

        // kembalikkan tanggapan berupa json yang berisi array
        return response()->json([
            // key message berisi pesan berikut
            'message' => 'success'
        ]);
    }

    public function destroy($produk_id)
    {
        // ambil detail produk
        $detail_produk = Produk::where('produk_id', $produk_id)->first();

        // hapus detail produk
        $detail_produk->delete();

        // kembalikkan tanggapan berupa json
        return response()->json([
            'message' => 'Success'
        ]);
    }
}
