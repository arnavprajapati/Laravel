<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function showblade()
    {
        $language = ["javascript", "c++"];
        $reversed = array_reverse($language);
        $name = "Arnav";
        return view('firstblade', [
            'languages' => $reversed,
            'name' => $name
        ]);
    }
}
