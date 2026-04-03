<?php

use Illuminate\Support\Facades\Route;

// unit-3 controller, blades and advanced routing

// Route::get('/', function () {
//     return view('welcome');
// });

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

// step -> create controller using command php artisan make:controller MiddlewareController
// step -> open your created controller and create a function to return something
// step -> create middleware using command php artisan make:middleware MiddlewarePO
// step -> open your created middleware and write your logic in handle function
// step -> register your middleware in bootstrap/app.php file
// step -> create a route and apply middleware to that route and call the controller function in that route

//  http://127.0.0.1:8000/middleware?age=17 --> this will return access denied because age is less than 18

Route::get('/middleware', [MiddlewareController::class, 'show'])
    ->middleware('agecheck'); // agecheck is the alias of MiddlewarePO that we have created in bootstrap/app.php


// now we are going to do global middleware and route group middleware 

Route::get('/globalmiddleware', [MiddlewareController::class, 'show']); // this route will be protected by global middleware that we have registered in bootstrap/app.php file

// previous two are custom middleware and global middleware but now we are going to do controller middleware which is applied to a specific controller or a group of controllers  // for global we use append method in bootstrap/app.php file and for controller middleware we use middleware method in the controller constructor

// third is controller middleware --> we can apply middleware to a specific controller or a group of controllers

use App\Http\Controllers\MyMidController;

Route::get('/dashboard', [MyMidController::class, 'dashboard']);
// Route::get('/admin', [MyMidController::class, 'admin']); 
Route::get('/country', [MyMidController::class, 'country']);

// template inheriting and blade components

Route::view('/myLogin', 'myLoginPage'); // this will return the view myLoginPage.blade.php when we hit the route /myLogin
Route::view('/myLogout', 'myLogoutPage'); // this will return the view myLogoutPage.blade.php when we hit the route /myLogout


// important note: extends in testcase.php file is used to extend the base test case class provided by Laravel, which allows us to use all the testing functionalities provided by Laravel in our test cases. It is important to extend the base test case class in order to write effective test cases for our application.

// task on whatsapp




// grouping routing with prefix using controller

use App\Http\Controllers\MyDemoController;

Route::prefix('mydemo')->controller(MyDemoController::class)->group(function () {
    Route::get('/display', 'display'); // this will call the display method of MyDemoController when we hit the route /mydemo/display
    Route::get('/details/{id}', 'details'); // this will call the details method of MyDemoController when we hit the route /mydemo/details/{id}
});

// group routing without prefix using controller

Route::controller(MyDemoController::class)->group(function () {
    Route::get('/display', 'display');
    // Route::get('/details/{id}', 'details')->where('id', '[0-9]{1,3}');
    // Route::get('/details/{id}', 'details')->whereNumber('id'); 
    Route::get('/details/{id}', 'details')->whereAlpha('id');

    // we going to use global constraint for this route so we don't need to specify the constraint for each route separately, we can specify the constraint globally for all routes that have {id} parameter
    // in appserviceprovider.php file first import Route facade and then in boot method write Route::pattern('id', '[0-9]{1,3}'); this will apply the constraint to all routes that have {id} parameter

    Route::get('/info/{id}', 'info');
});

// php output 

Route::get('/phpinfo', function () {
    $name = 'Arnav';

    // var_dump($name); // return in part of type and value of the variable
    // echo "Hello, my name is $name"; 
    $names = ['Arnav', 'Rahul'];
    print_r($names); // return the array in a human readable format
});

// data passing in view 

// Route::get('/practice', function () {
//     $name = 'Arnav';
//     $age = 99;
//     // return view('practice', ['name' => $name, 'age' => $age]);
//     return view('practice', compact('name', 'age')); 
// });

// domain routing in laravel
// in url write admin.localhost:8000/user or admin.localhost:8000/admin to see the result
Route::domain('admin.localhost')->group(function () {
    Route::get('/user', function () {
        return 'User Found';
    });
    Route::get('/admin', function () {
        return 'Admin Found';
    });
});

// name routing using controller

Route::get('/hello', function () {
    return view('mypractice');
});

Route::get('/display/abc/cdr/ref', [MyDemoController::class, 'displayy'])->name('myinfo');

// task -> create one parent layout called my parent inside that you have to create a blade template called home.blade.php inside that template there will be navigation like this home about contact profile there must be one image present over there in landscape mode footer section which contains copyright and year details now u have to create threee views in the views foolder about contact profile in that views u have to add the details in the corresponding colors in green red blue colors and include the parent content only two pages of your choice 

Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/profile', 'profile');


// task -> create a middleware globally there we need to authorize url with token 123a if u are authorized then a new view will be returned which will display a tour picutre other wise it will showcase custom error message you are outsider

Route::view('/tour', 'tour');

// url genration

// Method	Output
// url()->current()	http://127.0.0.1:8000/generation

// url()->full()	http://127.0.0.1:8000/generation?name=arnav&age=21

// request()->url()	http://127.0.0.1:8000/generation

// request()->fullUrl()	http://127.0.0.1:8000/generation?name=arnav&age=21

Route::view('/generation', 'generation');