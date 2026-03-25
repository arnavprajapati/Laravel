<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
    public function show()
    {
        return "This is a middleware controller";
    }
}
