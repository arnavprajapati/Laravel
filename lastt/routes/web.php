<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\Invokable123Controller;
use App\Http\Controllers\ResourceController;
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


// unit -> 2

Route::prefix('lang')->group(function () {
    Route::get('/', function () {
        return view('lang');
    });
    Route::get('/associative', function () {
        $courses = ['js', 'php', 'c++'];
        return view('student', [
            'courses' => $courses
        ]);
    });
    Route::get('/compact', function () {
        $courses = ['js', 'php', 'c++'];
        return view('student', compact('courses'));
    });
    Route::get('/with', function () {
        $courses = ['js', 'php', 'c++'];
        return view('student')
            ->with('courses', $courses);
    });
});

Route::get('/with-example', function () {
    $name = 'arnav';
    $age = 22;
    return view('data')
        ->with('name', $name)
        ->with('age', $age);
});

// Globally Sharing Data with Views

Route::get('/global-view', function () {
    return view('globalviews');
});

// Attaching Headers to Responses -> reason for this is to provide additional information about the response or to control how the client should handle the response.

Route::get('/adding-header', function () {
    return response("Headers are attached")
        ->header('app-name', 'basic/info')
        ->header('Content-Type', 'text/plain')
        ->header('File disposition', 'downloadable');
});

Route::get('/json-response', function () {
    $data = [
        'name' => 'Arnav',
        'age' => 20,
        'role' => 'developer'
    ];
    return response()->json($data);
});

Route::get('/json-responses', function () {
    return response()->json(
        [
            'name' => 'Arnav',
            'age' => 20,
            'role' => 'developer'
        ],
    );
});

// Attaching Cookies to Responses -> reason for this is to store small pieces of data on the client's browser, which can be used for various purposes such as session management, personalization, and tracking user preferences.

Route::get('/set-cookie', function () {
    return response("Cookie is set")
        ->cookie('user', 'Arnav', 60);
});

Route::get('/get-cookie', function () {
    $value = request()->cookie('user');
    return view('cookie', [
        'user' => $value
    ]);
    // compact -> compact('user') is a shorthand way to create an array with the variable name as the key and the variable value as the value. It is often used when passing data to views in Laravel. In this case, it would create an array like ['user' => $user] and pass it to the view.
    // return view('cookie', compact('user'));
});

Route::get('/delete-cookie', function () {
    return response("Cookie is deleted")
        ->cookie('user', '', -1);
});

Route::get('/old-url', function () {
    return redirect('/new-url');
});

Route::get('/new-url', function () {
    return "This is the new URL";
});

// unit -> 3

// basic controller route and passing data to view

Route::get('/first-blade', [FirstController::class, 'showblade']);

// invokable controller route
Route::get('/invokable/{id}', Invokable123Controller::class);

// Resource controller route command -> php artisan make:controller ResourceController --resource

Route::resource(
    'resource',
    ResourceController::class
);
