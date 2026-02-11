<?php

use App\Http\Controllers\SwaggerTestController;
use App\Http\Controllers\Api\UserController;


Route::get('/test', [SwaggerTestController::class, 'test']);
Route::get('/users', [UserController::class, 'index']);
