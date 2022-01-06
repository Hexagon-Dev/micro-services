<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::get('/login', [ApiAuthController::class, 'login'])->name('login');
Route::view('/register', 'register')->name('register');
