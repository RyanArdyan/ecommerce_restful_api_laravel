<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // email harus diisi, email dan maksimal 255
        // password harus diisi, password minimal 8 dan maksimal 20
        return [
            // input email harus mengikuti aturan berikut
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'password' => ['required', 'min:8', 'max:20'],
        ];
    }
}
