<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OldInputController extends Controller
{
    public function showForm()
    {
        return view('oldInputForm');
    }

    public function processForm(Request $request)
    {

        $request->validate([
            'username' => 'required|min:4',
            'email'    => 'required|email',
            'age'      => 'required|numeric|min:18'
        ]);

        return "Validation Passed! All data is correct.";
    }
}
