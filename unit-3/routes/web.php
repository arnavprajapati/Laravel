<?php

use Illuminate\Support\Facades\Route;

// unit-3 controller, blades and advanced routing

Route::get('/', function () {
    return view('welcome');
});

// controller and route creation 
// step 1: create controller using command php artisan make:controller firstcontroller
// step 2: open your created controller and create a function to return something
// step 3: open web.php and import your controller and create a route to call the function of your controller
// step 4: open your browser and type localhost:8000/first to see the result
// step 5: you can also create a blade file and return it from your controller function instead of returning a string

use App\Http\Controllers\firstcontroller;

Route::get('/first', [firstcontroller::class, 'show']);  // show is a method in firstcontroller that returns a string

// using blade file instead of string
Route::get('/firstblade', [firstcontroller::class, 'showblade']);

Route::get('/second/{string}', [firstcontroller::class, 'passshowblade']);

// calculator using controller
Route::get('/calculator/{num1}/{comm}/{num2}', [firstcontroller::class, 'calculator']);

// reverse string using controller 
Route::get('/reversestring/{string}', [firstcontroller::class, 'reverseString']);


// basic controller done now invokable controller 
// step 1: create invokable controller using command php artisan make:controller invokable123Controller --invokable


use App\Http\Controllers\invokable123Controller;

Route::get('/invokable', invokable123Controller::class); // since invokable controller has only one method __invoke, we can directly call the controller class without specifying the method


Route::get('/languages', invokable123Controller::class); // since invokable controller has only one method __invoke, we can directly call the controller class without specifying the method

// giving parameter to invokable controller
Route::get('/languages/{id}', invokable123Controller::class); // since invokable


// resource controller --> it is a controller that has all the methods for CRUD operations (create, read, update, delete)

use App\Http\Controllers\ResourceController;

Route::resource('resource', ResourceController::class); // this will create all the routes for CRUD operations for resource controller

// API controller --> it is a controller that is used to create APIs

use App\Http\Controllers\APIController;

// user /api call to get the data in json format from APIController index method

Route::get('/api', [APIController::class, 'index']); 

// Middleware Controller
use App\Http\Controllers\MiddlewareController;

Route::get('/middleware', [MiddlewareController::class, 'show']); 