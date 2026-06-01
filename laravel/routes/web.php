<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1.Request Data Retrieval 
Route::get('/form', [FormController::class, 'displayForm']);
Route::post('/submit', [FormController::class, 'submitForm']);
