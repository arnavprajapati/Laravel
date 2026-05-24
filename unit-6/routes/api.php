<?php

use App\Http\Controllers\Api\StudentApiController;
use Illuminate\Support\Facades\Route;

Route::get('/students', [StudentApiController::class, 'read']);
Route::get('/insert', [StudentApiController::class, 'insert']);
Route::put('/update/{id}', [StudentApiController::class, 'update']);
Route::delete('/delete/{id}', [StudentApiController::class, 'delete']);