<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\NameRule; //mandatory to import the rule

class ValidationController extends Controller
{
    public function validate(Request $request)
    {
        $request->validate([
            'name' => ['required', new NameRule], //using the rule in validation
        ]);

        return "Name is valid";
    }
}
