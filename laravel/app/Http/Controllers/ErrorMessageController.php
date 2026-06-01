<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorMessageController extends Controller
{
    public function showForm()
    {
        return view('errorForm');
    }
    public function processForm(Request $request)
    {

        $request->validate([
            'username' => 'required|alpha|min:4',
            'email'    => 'required|email',
        ]);
        return "Success! Form validated properly.";
    }
}
