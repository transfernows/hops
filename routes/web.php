<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/hoppa', [App\Http\Controllers\HoppaController::class, 'index']);