<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyDemoController extends Controller
{
    public function display()
    {
        return "hii there !!";
    }
    public function details($id)
    {
        return "you have signed in with id -> " . $id;
    }
}