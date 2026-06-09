<?php

use App\Http\Controllers\AgeCheckController;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\Invokable123Controller;
use App\Http\Controllers\MiddlewareController;
use App\Http\Controllers\MyDemoController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\FirstMiddleware;
use Illuminate\Support\Facades\Route;
use MongoDB\Builder\Expression\ReduceOperator;

use function Pest\Laravel\json;

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/api', [APIController::class, 'index']);


// middleware route -> agecheck middleware -> checks if age is above 18 or not, if not then return access denied else return access granted

// Browser
//    │
//    │  GET /middleware?age=19
//    ▼
// routes/web.php
//    │
//    │ Route::get('/middleware')
//    │ ->middleware('agecheck')
//    ▼
// bootstrap/app.php
//    │
//    │ 'agecheck' =>
//    │ FirstMiddleware::class
//    ▼
// app/Http/Middleware/FirstMiddleware.php
//    │
//    │ $age = $request->query('age');
//    │
//    ├── Age < 18 OR Age Missing
//    │         │
//    │         ▼
//    │   Return 403
//    │   Access Denied
//    │
//    └── Age >= 18
//              │
//              ▼
//       return $next($request);
//              │
//              ▼
// app/Http/Controllers/AgeController.php
//              │
//              ▼
//       public function show()
//       {
//           return "Access Granted";
//       }
//              │
//              ▼
//          Browser

Route::get(
    '/middleware',
    [AgeController::class, 'show']
)->middleware('agecheck');


// global middleware -> apply to all routes --> append in bootstrap/app.php -> use for example if you want to check age for all routes then you can use global middleware

Route::get('/global-middleware', [AgeController::class, 'show']);

// in thiss route we are checking for both age and country, if age is above 18 and country is india then only access granted else access denied

Route::get('/country', [CountryController::class, 'index']);

// here mylogin and mylogout are blade files which are created in resources/views folder, these routes are used to show the login and logout pages -> inheriting the layout from layout.blade.php file which is also created in resources/views folder


Route::view('/myLogin', 'myLoginPage');
Route::view('/myLogout', 'myLogoutPage');

// here we -> group the routes with prefix mydemo and controller MyDemoController, so that we don't have to write the controller name for each route, we can just write the method name and it will automatically call the method from the MyDemoController 

Route::prefix('mydemo')->controller(MyDemoController::class)->group(function () {
    Route::get('/display', 'display'); // this will call the display method of MyDemoController when we hit the route /mydemo/display
    Route::get('/details/{id}', 'details'); // this will call the details method of MyDemoController when we hit the route /mydemo/details/{id}
});


// 1-> query builder -> in this we are using DB facade to perform CRUD operations on the students table, we are inserting a student, getting all students, updating a student and deleting a student

Route::get('/students',[StudentController::class,'index']);

Route::get('/students/create',[StudentController::class,'create']);

Route::post('/students/store',[StudentController::class,'store']);

Route::get('/students/edit/{id}',[StudentController::class,'edit']);

Route::post('/students/update/{id}',[StudentController::class,'update']);

Route::get('/students/delete/{id}',[StudentController::class,'destroy']);