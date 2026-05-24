<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardController;

Route::get('/', function () {
    return view('MYForm');
});


Route::post('/submit', [ValidationController::class, 'validate']);

Route::get('/onboard', [OnboardController::class, 'showForm'])->name('onboard.form');
Route::post('/onboard', [OnboardController::class, 'submit'])->name('onboard.submit');
