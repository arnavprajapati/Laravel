<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstcontroller extends Controller
{
    public function show()
    {
        return "First controller create";
    }

    // passing data from controller to blade file using array

    public function showblade()
    {
        $language = ["javascript", "c++"];
        $reversed = array_reverse($language);
        $name = "Arnav";
        return view('firstblade', ['languages' => $reversed, 'name' => $name]);
    }

    // passing data from controller to blade file using compact function

    public function passshowblade($string)
    {
        $name = $string;
        $reverseName = strrev($name); 
        return view('second', compact('name', 'reverseName'));
    }
    

    // calculator using controller
    public function calculator($num1, $comm, $num2)
    {
        switch ($comm) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'sub':
                $result = $num1 - $num2;
                break;
            case 'mul':
                $result = $num1 * $num2;
                break;
            case 'div':
                $result = $num1 / $num2;
                break;
            default:
                return "Invalid operation";
        }

        return "Result is: " . $result;
    }

    // reverse using controller
    public function reverseString($string)
    {
        $reverseString = "";
        foreach ($string as $char) {
            $reverseString .= $char;
        }
        return "Reverse string " . $reverseString;
    }
}
