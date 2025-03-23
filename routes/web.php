<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return view('login');
})->name('login');

Route::middleware(['refresh.token'])->group(function () {
    Route::get('/pedidos', function () {
        return view('pedidos');
    })->name('pedidos');
});
