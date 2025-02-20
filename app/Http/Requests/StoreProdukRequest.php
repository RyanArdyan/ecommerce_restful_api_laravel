<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // agar bisa diakses
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kategori_id' => ['required'],
            'nama_produk' => ['required', 'unique:produk', 'max:255'],
            'deskripsi' => ['required'],
            'harga_beli' => ['required', 'integer'],
            'harga_jual' => ['required', 'integer', 'gt:harga_beli'],
            'stok' => ['required', 'integer'],
            // ukuran maksimal gambar sebesar 300 kb
            'gambar' => ['required', 'image', 'max:300'],
        ];
    }
}