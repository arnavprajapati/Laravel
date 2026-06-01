<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\CustomAgeRule; 

class customValidationController extends Controller
{
    public function validateForm(Request $request){
        
        // --- Validation Code ---
        // Notice the array syntax `['required', new CustomAgeRule]`
        $request->validate([
            'name'     => 'required|alpha|min:3',
            'password' => 'required|confirmed',
            'dob'      => ['required', 'numeric', new CustomAgeRule()]
        ]);

        return "Successfully validated!";
    }
}