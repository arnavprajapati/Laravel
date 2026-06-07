<?php

use Illuminate\Support\Facades\Route;

use function Pest\Laravel\json;

Route::get('/', function () {
    return response()->json([
        'name' => 'arnav',
    ]);
});
