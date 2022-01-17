<?php

use App\Http\Controllers\AuthController;
use App\Http\Procedures\LoginProcedure;
use App\Http\Procedures\RegisterProcedure;
use Illuminate\Support\Facades\Route;

Route::post('/v1/register', [AuthController::class, 'register'])->name('register');
Route::post('/v1/login', [AuthController::class, 'login'])->name('login');

Route::rpc('/v2/register', [LoginProcedure::class])->name('rpc.login');
Route::rpc('/v2/login', [RegisterProcedure::class])->name('rpc.register');
