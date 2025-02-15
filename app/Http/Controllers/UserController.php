<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// untuk hashing password
use Illuminate\Support\Facades\Hash;
// validasi form
use App\Http\Requests\RegistrasiRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUserRequest;
// untuk berinteraksi dengan data milik database
use Illuminate\Support\Facades\DB;
use App\Models\User;
// untuk mengirim response berupa json
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
// untuk autentikasi
use Illuminate\Support\Facades\Auth;

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
        return new UserResource(User::find($user->user_id));
    }

    // untuk menampilkan semua data user
    public function index()
    {
        // kembalikkan inisialisasi UserCollection untuk mengirim semua data user yang diurutkan dari angka besar ke kecil berdasarkan column user_id
        return new UserCollection(User::orderBy('user_id', 'desc')->simplePaginate(3));
    }

    // LoginRequest melakukan validasi form
    // $request menangkap semua data yang dikirim oleh form
    public function login(LoginRequest $request)
    {
        // return response()->json($request->all());
        // jika autenteikasi dari input name email dan password sama dengan data di table users maka
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // berisi detail user yang login saat ini
            $detail_user = Auth::user();
            // buat token
            $token = $request->user()->createToken('oligarki_sialan')->plainTextToken;

            return response()->json([
                'status' => 'sukses',
                'token' => $token,
                'user' => [
                    'user_id' => $detail_user->user_id,
                    'username' => $detail_user->username,
                    'email' => $detail_user->email
                ]
            ]);
        }
    }

    // UpdateUserRequest akan mengurus validasi 
    // request akan mengambil isi attribute name
    public function update(UpdateUserRequest $request)
    {
        // ambil value input name="user_id"
        $user_id = $request->user_id;

        $detail_user = User::where('user_id', $user_id)->first();


        // update detail user ke table users
        $detail_user->username = $request->username;
        $detail_user->email = $request->email;
        $detail_user->nama_pertama = $request->nama_pertama;
        $detail_user->nama_terakhir = $request->nama_terakhir;
        $detail_user->telepon = $request->telepon;
        $detail_user->alamat = $request->alamat;
        $detail_user->kota = $request->kota;
        $detail_user->provinsi = $request->provinsi;
        $detail_user->provinsi = $request->kode_pos;
        $detail_user->negara = $request->negara;
        $detail_user->password = Hash::make($request->password);

        // simpan data yang sudah diubah ke database
        $detail_user->save();

        // kembalikkan response berupa json berupa detail user
        return new UserResource(User::find($user_id));
    }
}
