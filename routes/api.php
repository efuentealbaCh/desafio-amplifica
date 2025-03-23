<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShippController;

Route::post('/auth', [AuthController::class, 'authenticate']);

Route::middleware(['refresh.token'])->group(function () {
    // Tus rutas aquí
    Route::post('/getRate', [ShippController::class, 'getRate']);
    Route::get('/regiones', [ShippController::class, 'getRegionesConfig']);
});
