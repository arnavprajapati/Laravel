<?php

namespace App\Http\Controllers;

use App\Rules\EmailRule;
use Illuminate\Http\Request;
use App\Rules\NameRule;

class ValidationController extends Controller
{
    public function validate(Request $request)
    {
        $request->validate([
            'name' => ['required', new NameRule],
            'email' => ['required', new EmailRule],
        ]);

        return "Name and email are valid";
    }
}
