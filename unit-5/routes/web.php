<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('MYForm');
});


Route::post('/submit', [ValidationController::class, 'validate']);