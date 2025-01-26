<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\DashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/register/process', [AuthController::class, 'regProcess']);
Route::post('/login/process', [AuthController::class, 'logProcess']);

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});

