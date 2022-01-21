<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/pokemon', [PokemonController::class, 'showAll']);
Route::get('/pokemon/{id}', [PokemonController::class, 'showOne']);
Route::get('/pokemon/img/{name}', function ($name) {
    $path = public_path('img') . '/' . $name;
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
