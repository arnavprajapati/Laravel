<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "hello duniya kaise ho";
});

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