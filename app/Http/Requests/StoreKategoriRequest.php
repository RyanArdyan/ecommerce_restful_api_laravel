<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
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
            // nama_kategori -> wajib, unik, maksimal 255
            // parent_id: nullable
            'nama_kategori' => ['required', 'unique:kategori,nama_kategori', 'max:255'],
            'parent_id' => ['nullable']
        ];
    }
}
