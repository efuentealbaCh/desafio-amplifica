<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShippController;

Route::post('/auth', [AuthController::class, 'authenticate'])->name('api.login');

Route::middleware(['refresh.token'])->group(function () {
    Route::post('/getRate', [ShippController::class, 'getRate']);
    Route::get('/regiones', [ShippController::class, 'getRegionesConfig']);
});
