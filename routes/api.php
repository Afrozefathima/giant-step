<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\OrderController;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// This is the correct way to protect routes:
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class)->only(['index', 'show', 'store']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('orders', [OrderController::class, 'store']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
