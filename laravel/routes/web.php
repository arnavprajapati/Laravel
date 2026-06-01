<?php

use App\Http\Controllers\customValidationController;
use App\Http\Controllers\ErrorMessageController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\OldInputController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1.Request Data Retrieval 
Route::get('/form', [FormController::class, 'displayForm']);
Route::post('/submit', [FormController::class, 'submitForm']);

// 3.Old Input
Route::get('/old-input/form', [OldInputController::class, 'showForm']);
Route::post('/old-input/submit', [OldInputController::class, 'processForm']);

//4.Form Validation

Route::get('/validation', function () {
    return view('customValidationForm');
});
Route::post('/validate/submit', [customValidationController::class, 'validateForm']);

//5.Error Messages (@error)

Route::get('/error-messages', [ErrorMessageController::class, 'showForm']);
Route::post('/error-messages/submit', [ErrorMessageController::class, 'processForm']);
