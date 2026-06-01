<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function displayForm()
    {
        return view('MyFormView');
    }

    public function submitForm(Request $request)
    {
        $data = $request->all();
        return
            "Name: " . $data['name'] .
            "<br>Email: " . $data['email'] .
            "<br>Phone: " . $data['phone'];
    }
    public function showview()
    {
        return view('uploadView');
    }
}