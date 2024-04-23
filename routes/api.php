<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ApiController::class, 'index']);
    Route::get('/products/{product}', [ApiController::class, 'show']);
    Route::post('/products', [ApiController::class, 'store']);
    Route::put('/products/{product}', [ApiController::class, 'update']);
    Route::delete('/products/{product}', [ApiController::class, 'destroy']);
});