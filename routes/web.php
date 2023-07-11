<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeksController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name ('login-proses');
    Route::get('/logout', [LoginController::class, 'logout'])->name ('logout');

    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
});

// Route::get('/api', [ApiController::class, 'apiWithoutKey']);

Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home', [TeksController::class, 'store'])->name('home');
    Route::delete('/beritas/{berita}', [HomeController::class, 'destroy'])->name('beritas-destroy');
    Route::get('/klasifikasi-berita', [TeksController::class, 'index'])->name('klasifikasi-berita');
});




