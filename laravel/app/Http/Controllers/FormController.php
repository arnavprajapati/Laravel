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

        $request->validate([
            'name'  => 'required|alpha|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);

        $data = $request->all();

        $name = $data['name'] ?? "missing";
        $email = $data['email'] ?? "missing";
        $phone = $data['phone'] ?? "missing";

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
