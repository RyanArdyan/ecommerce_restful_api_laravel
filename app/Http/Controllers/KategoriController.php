<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// validasi simpan kategori 
use App\Http\Requests\StoreKategoriRequest;
// model kategori
use App\Models\Kategori;
// response json berupa detail data
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    // validasi akan dilakukan oleh StoreKategoriRequest sebelum masuk ke blok method nya
    public function store(StoreKategoriRequest $request)
    {
        // simpan data ke table kategori
        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'parent_id' => $request->parent_id
        ]);
        // kembalikkan panggil instansiasi KategoriSumberDaya lalu kirimkan detail kategori berdasarkan value kategori_id
        return new KategoriResource(Kategori::find($kategori->kategori_id));
    }

    // parameter $kategori_id berisi kategori_id yang dikirimkan oleh frontend ke rute lewat tombol
    public function show($kategori_id)
    {
        // kembalikkan panggil instansiasi KategoriSumberDaya lalu kirimkan detail kategori berdasarkan value kategori_id
        return new KategoriResource(Kategori::find($kategori_id));
    }

    // parameter $kategori_id berisi kategori_id yang dikirimkan oleh frontend ke rute lewat tombol
    public function destroy($kategori_id)
    {
        // ambil detail kategori berdasarkan $kategori_id
        $detail_kategori = Kategori::where('kategori_id', $kategori_id)->first();
        // hapus detail kategori
        $detail_kategori->delete();
        // kembalikkan tanggapan berupa json array
        return response()->json([
            // index message berisi 'success'
            'message' => 'Success'
        ]);
    }
}
