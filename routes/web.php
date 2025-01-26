<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\ScheduleController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\customer\CustOrdersController;
use App\Http\Controllers\customer\CustScheduleController;
use App\Http\Controllers\customer\CustDashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/register/process', [AuthController::class, 'regProcess']);
Route::post('/login/process', [AuthController::class, 'logProcess']);
Route::get('/logout', [AuthController::class, 'logoutProcess']);

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/schedule', [ScheduleController::class, 'index']);
    Route::post('/schedule/add/process', [ScheduleController::class, 'create']);
    Route::post('/schedule/delete/process', [ScheduleController::class, 'delete']);
    Route::post('/schedule/update/process', [ScheduleController::class, 'update']);
    Route::post('/customer/add/process', [CustomerController::class, 'create']);
});

Route::prefix('customer')->group(function () {
    Route::get('/', [CustDashboardController::class, 'index']);
    Route::get('/orders', [CustOrdersController::class, 'index']);
    Route::get('/schedule', [CustScheduleController::class, 'index']);
    Route::post('/schedule/order/process', [CustScheduleController::class, 'orderProcess']);
});

