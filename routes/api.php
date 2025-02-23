<?php

use App\Http\Controllers\RoistatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::post('/products', 'store');
    Route::put('/products/{product}', 'update');
    Route::delete('/products/{product}', 'destroy');
    Route::get('/products/{product}', 'show');
});


Route::controller(\App\Http\Controllers\ReceiptController::class)->group(function () {
    Route::get('/receipts', 'index');
    Route::post('/receipts', 'store');
    Route::put('/receipts/{receipt}', 'update');
    Route::delete('/receipts/{receipt}', 'destroy');
    Route::get('/receipts/{receipt}', 'show');
});
