<?php

use App\Module\Market\Controllers\AuthController;
use App\Module\Market\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register'])->name('v1.auth.register');
        Route::post('login', [AuthController::class, 'login'])->name('v1.auth.login');
    });

    Route::prefix('products')->middleware('auth:sanctum')->group(function () {
        Route::get('', [ProductsController::class, 'index'])->name('v1.products.index');
    });
});
