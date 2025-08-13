<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::apiResource('brand', BrandController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

