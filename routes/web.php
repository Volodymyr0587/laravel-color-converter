<?php

use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'color-converter')->name('color-converter');

Route::post('/hex-to-rgb', [ColorController::class, 'hexToRgb'])->name('hex-to-rgb');
Route::post('/rgb-to-hex', [ColorController::class, 'rgbToHex'])->name('rgb-to-hex');
