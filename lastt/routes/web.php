<?php

use Illuminate\Support\Facades\Route;
use MongoDB\Builder\Expression\ReduceOperator;

use function Pest\Laravel\json;

Route::get('/user', function () {
    return response()->json([
        'name' => 'arnav',
    ]);
});

Route::get('/user/{id}/{name?}', function ($id, $name = 'not defined') {
    return response()->json([
        "id" => $id,
        "name" => $name,
    ]);
})->where(
    [
        'id' => '[0-9]{2}',
        'name' => '[a-zA-Z]+'
    ]
);

//name route
Route::get('/name-route', function () {
    return view('namerouting');
});

Route::get('/profile', function () {
    return "Profile";
})->name('profile');

//group route
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard";
    });
    Route::get('/settings', function () {
        return "Settings";
    });
});

//redirect route
Route::get('/login', function () {
    return redirect()->route('profile');
});

//fallback
Route::fallback(function () {
    return view('error');
});
