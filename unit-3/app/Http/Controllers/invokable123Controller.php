<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class invokable123Controller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return "This is an invokable controller.";
    }
}
