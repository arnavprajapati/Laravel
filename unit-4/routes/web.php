<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';

// we not added security token so 419 error will come when we submit the form, to fix this we need to add @csrf in our form blade file.

// include security csrf token in form blade file to prevent 419 error
// include inbuilt validation rules in controller to validate form data

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form', [FormController::class, 'submit'])->name('form.submit');