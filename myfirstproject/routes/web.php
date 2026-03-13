<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "hello duniya kaise ho";
});

// Basic Routing
Route::get('/display', function () {
    for ($i = 0; $i <= 5; $i++) {
        // return $i;
        echo $i . "<br>";
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

//Contraint Routing with alphabet
Route::get('/user/{name}', function ($name) {
    return "User name ->: " . $name;
})->where('name', '[A-Z]+');

//Contraint Routing with condition
Route::get('/user/{id}', function ($id) {
    return "The details are " . $id;
})->where('id', '[0-9]{3}');

// Fallback Routing
Route::fallback(function () {
    return view('error');
});

//Named Routing
Route::get('/user/profile', function () {
    return "This is user profile page";
})->name('profile');

//Group Routing
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "This is admin dashboard";
    });
    Route::get('/settings', function () {
        return "This is admin settings";
    });
});


// Task 1 
// Access these routes via URLs like:
    // /event-home
    // /events
    // /event/cognitia
    // /register/cognitia/John/123
    // /register/cognitia/John/123/CSE
    // /event-id/123
    // /event-id/12 (should fail)

    
Route::get('/user/{id}', function ($id) {

    Route::get('/event-home', function () {
        return "<h1>Welcome to LPU!</h1>";
    });

    Route::get('/events', function () {
        $events = ['Cognitia', 'Internal ', 'Mini', 'Final Expo'];
        return '<h2>Available Events:</h2><ul>' . implode('', array_map(fn($e) => "<li>$e</li>", $events)) . '</ul>';
    });

    Route::get('/event/{name}', function ($name) {
        $events = [
            'cognitia' => 'Cognitia: Annual Tech Fest',
            'internal' => 'Internal Event: Departmental Gathering',
            'miniexpo' => 'Mini Expo: Student Projects',
            'finalexpo' => 'Final Expo: Graduation Showcase'
        ];
        $key = strtolower(str_replace(' ', '', $name));
        return $events[$key] ?? "Event not found.";
    });

    Route::get('/register/{event}/{name}/{roll}', function ($event, $name, $roll) {
        return "Registered $name (Roll: $roll) for $event.";
    })->where('roll', '[0-9]+'); 

    Route::get('/register/{event}/{name}/{roll}/{branch?}', function ($event, $name, $roll, $branch = null) {
        $msg = "Registered $name (Roll: $roll) for $event.";
        if ($branch) $msg .= " Branch: $branch.";
        return $msg;
    })->where('roll', '[0-9]+');

    // 6. ID constraint: exactly three digits
    Route::get('/event-id/{id}', function ($id) {
        return "Event ID: $id";
    })->where('id', '^\d{3}$');

    return "User id ->: " . $id;
})->where('id', '[0-9]+');