<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // jadikan true agar bisa diakses
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
            'username' => ['required', 'unique:users,username', 'min:3', 'max:255'],
            'email' => ['required', 'unique:users,email', 'email:rfc,dns', 'max:255'],
            'password' => ['required', 'min:8', 'max:20', 'confirmed']
        ];
    }
}
