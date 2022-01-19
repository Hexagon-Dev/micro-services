<?php

use App\Http\Controllers\AuthController;
use App\Http\Procedures\AuthProcedure;
use Illuminate\Support\Facades\Route;

Route::post('/v1/register', [AuthController::class, 'register'])->name('register');
Route::post('/v1/login', [AuthController::class, 'login'])->name('login');

Route::rpc('/v2/endpoint', [AuthProcedure::class])->name('rpc.endpoint');
