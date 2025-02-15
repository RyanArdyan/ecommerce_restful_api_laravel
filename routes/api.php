<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// rute tipe kirim, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
Route::post('/registrasi', [UserController::class, 'registrasi']);

Route::get('/users', [UserController::class, 'index']); 

Route::post('/login', [UserController::class, 'login']);

// rute grup middleware
// hanya yang sudah login bisa mengakses grup fungsi berikut
Route::middleware('auth:sanctum')->group(function () {
    // rute tipe dapatkan, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
    Route::get('/users', [UserController::class, 'index']);
    // rute tipe letakkan, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut
    Route::post('/user/update', [UserController::class, 'update']); 
});