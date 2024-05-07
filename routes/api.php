<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoppaController;

Route::controller(HoppaController::class)->group(function () {
    Route::post('order', 'index');
});