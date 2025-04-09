<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\AuthController;


/*
|--------------------------------------------------------------------------
| Public Routes (OAuth token endpoint)
|--------------------------------------------------------------------------
| Ini digunakan untuk login dan mendapatkan access token
*/
Route::middleware('api')->group(function () {
    Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
});

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected Routes (API v1 with auth:api middleware)
|--------------------------------------------------------------------------
| Semua route di sini hanya bisa diakses jika user mengirim token Bearer
*/
Route::prefix('v1')->group(function () {
    // Public routes
    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/{post}', [PostController::class, 'show']);

    // Protected routes
    Route::middleware('auth:api')->group(function () {
        Route::post('posts', [PostController::class, 'store']);
        Route::put('posts/{post}', [PostController::class, 'update']);
        Route::delete('posts/{post}', [PostController::class, 'destroy']);

        // 📁 Category routes (optional, bisa untuk keperluan CRUD kategori)
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::get('/categories/{id}', [CategoryController::class, 'show']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);



    });
});