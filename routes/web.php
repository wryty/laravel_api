<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductFrontendController;

Route::get('/statistic', [ApiController::class, 'statistic']);
Route::get('/', [ProductFrontendController::class, 'index'])->name('products.index');
Route::post('/products', [ApiController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ApiController::class, 'destroy'])->name('products.destroy');