<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Postman Export Route
Route::get('/postman-export', function () {
    $path = storage_path('api-docs/api-docs.json');

    if (!file_exists($path)) {
        return response()->json([
            'error' => 'Phela terminal ma "php artisan l5-swagger:generate" command run karo!'
        ], 404);
    }

    return response()->download($path, 'Laravel12_Postman_Collection.json', [
        'Content-Type' => 'application/json',
    ]);
});