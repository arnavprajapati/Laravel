<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// we not added security token so 419 error will come when we submit the form, to fix this we need to add @csrf in our form blade file.

// include security csrf token in form blade file to prevent 419 error
// include inbuilt validation rules in controller to validate form data

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form', [FormController::class, 'submit'])->name('form.submit');

// upload file

Route::get('/upload', [UploadController::class, 'showview']);
Route::post('/upload', [UploadController::class, 'submit'])->name('upload.submit');

// laravel localization -> two methods simple way and second using middleware + session to store selected language and apply it across the application.

// method 1 simple way 
// step1 -> in resource/lang create folder for each language eg: pa for punjabi and en for english
// step2 -> create messages.php file in each language folder and add key value pairs for translations
// step3 -> create blade ex home.blade.php and use __('messages.welcome') to display welcome message in selected language
// step4 -> in env file set default locale eg: APP_LOCALE=pa for punjabi and APP_LOCALE=en for english

// write in browser http://localhost:8000/lang to switch to punjabi language and http://localhost:8000/lang to switch to english language.

// drawback of this method is we need to change env file to switch language and it will apply globally across the application, we cannot switch language for specific user or session.

// ques -> display 6 lang marathi gujrati telugu bhojpuri urdu and hindi my name class bio and skill in each language using method 1 simple way of laravel localization.

Route::get('/lang', function () {
    return view('Home');
});

Route::get('/lang/locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
});
