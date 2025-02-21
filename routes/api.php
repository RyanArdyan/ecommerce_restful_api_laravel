<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// rute tipe kirim, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
Route::post('/registrasi', [UserController::class, 'registrasi']);

Route::get('/users', [UserController::class, 'index']); 

Route::get('/login', [UserController::class, 'pesan_untuk_tamu_belum_login'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// rute grup middleware
// hanya yang sudah login bisa mengakses grup fungsi berikut
Route::middleware('auth:sanctum')->group(function () {
    // rute tipe dapatkan, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
    Route::get('/users', [UserController::class, 'index']);
    // rute tipe letakkan, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
    Route::post('/user/update', [UserController::class, 'update']);
    // rute tipe dapatkan, jika user diarahkan ke url berikut lalu mengirim user_id maka arahkan ke controller dan method berikut
    Route::get('/user/{user_id}', [UserController::class, 'show']);
    // rute tipe kirim, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
    Route::post('/admin/kategori', [KategoriController::class, 'store']);
    // rute tipe dapatkan, jika user diarahkan ke url berikut lalu mengirim kategori_id maka arahkan ke controller dan method berikut
    Route::get('/admin/kategori/{kategori_id}', [KategoriController::class, 'show']);
    // rute tipe dapatkan, jika user diarahkan ke url berikut lalu mengirim kategori_id maka arahkan ke controller dan method berikut
    Route::get('/admin/kategori/delete/{kategori_id}', [KategoriController::class, 'destroy']);
    // rute tipe dapatkan, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
    Route::get('/admin/kategori', [KategoriController::class, 'index']);
    // rute tipe kirim, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
    Route::post('/admin/produk', [ProdukController::class, 'store']);
    // rute tipe dapatkan, jika user diarahkan ke url berikut lalu mengirimkan id maka arahkan ke controller dan method berikut
    Route::get('/admin/produk/destroy/{produk_id}', [ProdukController::class, 'destroy']);
});