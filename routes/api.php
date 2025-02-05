<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// rute tipe kirim, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut lalu name nya adalah sebagai berikut
Route::post('/registrasi', [UserController::class, 'registrasi'])->name('user.registrasi');
// rute tipe kirim, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut lalu name nya adalah sebagai berikut
Route::post('/login', [UserController::class, 'login'])->name('user.loginnn');
// rute tipe dapatkan, jika user diarahkan ke url berikut maka arahkan ke controller dan method berikut lalu name nya adalah sebagai berikut
Route::get('/users', [UserController::class, 'index'])->name('user.index');
