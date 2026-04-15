<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Show form
    public function index()
    {
        return view('form');
    }

    // Handle form submission
    public function submit(Request $request)
    {
        // Validation FIRST
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        // Access validated data
        $name = $validated['name'];
        $email = $validated['email'];

        // return back()->with('success', 'Form submitted successfully!');
        return response()->json([
            'message' => 'Form submitted successfully!',
            'data' => $validated,
        ]);
    }
}
