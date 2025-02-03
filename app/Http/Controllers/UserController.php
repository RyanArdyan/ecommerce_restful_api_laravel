<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// untuk hashing password
use Illuminate\Support\Facades\Hash;
// validasi form registrasi
use App\Http\Requests\RegistrasiRequest;
// untuk berinteraksi dengan data milik database
use Illuminate\Support\Facades\DB;
use App\Models\User;
// untuk mengirim response berupa json
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    // RegistrasiRequest melakukan validasi form
    // parameter $request berisi request yang dikirim oleh form
    public function registrasi(RegistrasiRequest $request)
    {
        // dd($request->all());
        // simpan detail user ke table users
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // gunakan UserResource sebagai response agar seperti java spring boot
        return new UserResource(User::findOrFail($user->user_id));
    }

    // untuk menampilkan semua data user
    public function index()
    {
        // kembalikkan inisialisasi UserCollection untuk mengirim semua data user yang diurutkan dari angka besar ke kecil berdasarkan column user_id
        return new UserCollection(User::orderBy('user_id', 'desc')->simplePaginate(3));
    }

    public function login()
    {

    }
}
