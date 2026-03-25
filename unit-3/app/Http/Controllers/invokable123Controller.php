<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class invokable123Controller extends Controller
{
    /**
     * Handle the incoming request.
     */

    // dynamic parameter passing to invokable controller using request object or list for accepting parameter

    public function __invoke($id)
    {
        $lang = [
            1 => 'javascript',
            2 => 'c++',
            3 => 'php'
        ];

        // return $lang[$id] ?? 'not found';

        // now showing on view file instead of returning string

        // return view('missing', ['language' => $lang[$id] ?? 'not found']);

        // task if parameter 1 then show factorial 10 then if 2 then show that name h1 to h6 any content and for 3 patter of 5 rows and 5 columns of * and if not found then show not found

        if ($id == 1) {
            $factorial = 1;
            for ($i = 1; $i <= 10; $i++) {
                $factorial *= $i;
            }
            return "Factorial of 10 is: " . $factorial;
        } elseif ($id == 2) {
            return "<h1>Heading 1</h1><h2>Heading 2</h2><h3>Heading 3</h3><h4>Heading 4</h4><h5>Heading 5</h5><h6>Heading 6</h6>";
        } elseif ($id == 3) {
            $pattern = "";
            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 5; $j++) {
                    $pattern .= "* ";
                }
                $pattern .= "<br>";
            }
            return $pattern;
        } else {
            return "Not found";
        }
    }
}
