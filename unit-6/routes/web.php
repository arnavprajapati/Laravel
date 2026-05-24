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
Route::get('/mongo-insert', [MongoDBController::class, 'insert']);
Route::get('/mongo-read', [MongoDBController::class, 'read']);
Route::get('/mongo-update', [MongoDBController::class, 'updateData']);
Route::get('/mongo-delete', [MongoDBController::class, 'deleteData']);


Route::get('/', [MongoDBController::class, 'index']);
Route::post('/insert-data', [MongoDBController::class, 'store']);
Route::get('/edit/{id}', [MongoDBController::class, 'edit']);
Route::post('/update/{id}', [MongoDBController::class, 'update']);
Route::get('/delete/{id}', [MongoDBController::class, 'destroy']);