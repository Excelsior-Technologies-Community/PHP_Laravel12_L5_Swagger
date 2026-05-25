<?php

use App\Http\Controllers\SwaggerTestController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::middleware('throttle:api')->group(function () {
    Route::get('/test', [SwaggerTestController::class, 'test']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
});

Route::get('/postman-export', function () {
    $path = storage_path('api-docs/api-docs.json');

    if (!file_exists($path)) {
        return response()->json(['error' => 'File not found'], 404);
    }

    return response()->download($path, 'Laravel12_Postman_Collection.json', [
        'Content-Type' => 'application/json',
    ]);
});