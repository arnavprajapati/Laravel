<?php

use Illuminate\Support\Facades\Route;

// unit-3 controller, blades and advanced routing

Route::get('/', function () {
    return view('welcome');
});

// controller and route creation 

use App\Http\Controllers\firstcontroller;
Route::get('/first', [firstcontroller::class, 'show']);