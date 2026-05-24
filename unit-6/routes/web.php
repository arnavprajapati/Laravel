<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return "hello world";
});

Route::get('/insert', [StudentController::class, 'insert']);
Route::get('/read', [StudentController::class, 'read']);
Route::get('/update', [StudentController::class, 'updateData']);
Route::get('/delete', [StudentController::class, 'deleteData']);

Route::get('/insert-eloquent', [StudentController::class, 'insert']);
Route::get('/read-eloquent', [StudentController::class, 'read']);
Route::get('/update-eloquent', [StudentController::class, 'updateData']);
Route::get('/delete-eloquent', [StudentController::class, 'deleteData']);

use App\Http\Controllers\MongoDBController;

Route::get('/mongo-test', [MongoDBController::class, 'insert']);