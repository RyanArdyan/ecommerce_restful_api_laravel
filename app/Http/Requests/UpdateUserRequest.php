<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // jadikan true agar dapat diakses
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // ambil value input name="user_id"
        $user_id = $this->input('user_id');

        return [
            'username' => ['required', 
                'min:3', 
                'max:255',
                // jika user tidak mengubah username nya maka validasi unique tidak akan berjalan
                Rule::unique('users', 'username')->ignore($user_id, 'user_id')
            ],
            'email' => ['required', 
                'email:rfc,dns', 
                'max:255',
                Rule::unique('users', 'email')->ignore($user_id, 'user_id')
            ],
            'nama_pertama' => ['required', 'max:255'],
            'nama_terakhir' => ['required', 'max:255'],
            'telepon' => ['required', 'max:255'],
            'alamat' => ['required'],
            'kota' => ['required', 'max:255'],
            'provinsi' => ['required', 'max:255'],
            'kode_pos' => ['required', 'max:255'],
            'negara' => ['required', 'max:255'],
            'password' => ['required', 'min:8', 'max:20']
        ];
    }
}
