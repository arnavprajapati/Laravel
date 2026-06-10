<?php

namespace App\Http\Controllers;

use App\Rules\CustomAgeRule;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showform()
    {
        return view('formview');
    }
    public function submitform(Request $request)
    {
        $request->validate([
            'name'  => 'required|alpha|min:3',
            'email' => 'required|email',
            'age' => ['required', 'numeric', new CustomAgeRule]
        ]);
        $data = $request->all();
        return "Name: " . $data['name'] . "<br> Age: " . $data['age'] . "<br> Email: " . $data['email'];
    }
}
