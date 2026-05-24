<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return "hello world";
});

Route::get('/insert', [StudentController::class, 'insert']);
