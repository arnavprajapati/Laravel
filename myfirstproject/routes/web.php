<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "hello duniya kaise ho";
});

// Basic Routing
Route::get('/display', function () {
    for($i=0;$i<=5;$i++){
        // return $i;
        echo $i . "<br>" ;
    }
});

Route::get('/array', function () {
    $arr = ["php", "laravel", "javascript", "python"];
    foreach ($arr as $value) {
        echo $value . "<br>";
    }
});

// Required Routing 
Route::get('/user/{id}', function ($id) {
    return "User id ->: " . $id;
});

//Optional Routing 
Route::get('/user/{name?}', function ($name = "kuch nhi hai") {
    return "User name ->: " . $name;
});

//MultiValue Routing
Route::get('/user/{id}/{name}', function ($id, $name) {
    return "User id ->: " . $id . " and name ->: " . $name;
});

//Contraint Routing with numbers
Route::get('/user/{id}', function ($id) {
    return "User id ->: " . $id ;
}) -> where('id', '[0-9]+');

//Contraint Routing with alphabet
Route::get('/user/{name}', function ($name) {
    return "User name ->: " . $name ;
}) -> where('name', '[A-Z]+');

//Contraint Routing with condition
Route::get('/user/{id}', function ($id){
    return "The details are " . $id;
}) -> where('id', '[0-9]{3}');

// Fallback Routing
Route::fallback(function () {
    return view('error');
});

//Named Routing
Route::get('/user/profile', function () {
    return "This is user profile page";
}) -> name('profile');

//Group Routing
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "This is admin dashboard";
    });
    Route::get('/settings', function () {
        return "This is admin settings";
    });
});