<?php

use App\Http\Controllers\SwaggerTestController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\Api\ProductController;


Route::get('/test', [SwaggerTestController::class, 'test']);
Route::get('/users', [UserController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);