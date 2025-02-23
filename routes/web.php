<?php

use App\Http\Controllers\RoistatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/form', [RoistatController::class, 'store']);
