<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/post-comments',[PostController::class, 'index']);

Route::apiResource('pelanggan', PelangganController::class);
Route::apiResource('menu', MenuController::class);
