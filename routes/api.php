<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::get('/test-connection', function () {
    return response()->json([
        'message' => 'Frontend dan Backend sudah terkoneksi!',
        'time' => now()->toDateTimeString()
    ]);
});

Route::apiResource('brand', BrandController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

