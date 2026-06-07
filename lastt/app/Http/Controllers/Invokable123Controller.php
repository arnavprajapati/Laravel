<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Invokable123Controller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        return "This is an invokable controller with ID: $id";
    }
}
