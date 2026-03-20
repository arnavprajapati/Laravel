<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstcontroller extends Controller
{
    public function show() {
        return "First controller create";
    }
    public function showblade() {
        return view('firstblade');
    }

    // calculator using controller
    public function calculator($num1, $comm, $num2) {
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
    public function reverseString($string){
        $reverseString = "";
        foreach($string as $char) {
            $reverseString .= $char;
        }
        return "Reverse string " . $reverseString;
    }
}