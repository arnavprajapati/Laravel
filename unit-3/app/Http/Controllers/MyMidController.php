<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CMMiddleware;

class MyMidController extends Controller
{
    // contructor to apply middleware to specific methods of this controller
    public function __construct() {
        $this->middleware('age')->only(['admin']);
    }
    public function dashboard() {
        return "This is the dashboard page.";
    }
    public function admin() {
        return "This is the admin page.";
    }
}
