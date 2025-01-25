<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/register/process', [AuthController::class, 'regProcess']);
Route::post('/login/process', [AuthController::class, 'logProcess']);
