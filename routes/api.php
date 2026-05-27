<?php

use App\Http\Controllers\SwaggerTestController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

// Existing Routes (Kuch change nahi karvo)
Route::get('/test', [SwaggerTestController::class, 'test']);
Route::get('/users', [UserController::class, 'index']);

// New Routes (Add karo - only new functionality)
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);