<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::get('/pokemon', [PokemonController::class, 'showAll'])->name('pokemon');
Route::get('/pokemon/{id}', [PokemonController::class, 'showOne'])->name('pokemon_one');
