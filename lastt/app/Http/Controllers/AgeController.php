<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function show () {
        return "you are above 18 years old, you can access this route";
    }
}
