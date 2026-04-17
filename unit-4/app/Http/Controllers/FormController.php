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
            'phone' => 'nullable|numeric|digits:10',
        ]);

        // // Access validated data
        // $name = $validated['name'];
        // $email = $validated['email'];
        // $phone = $validated['phone'];

        // // return back()->with('success', 'Form submitted successfully!');
        // return response()->json([
        //     'message' => 'Form submitted successfully!',
        //     'data' => $validated,
        // ]);


        // second way of request data retrieval via input method

        // $name = $request->input('name');
        // $email = $request->input('email');
        // $phone = $request->input('phone');

        // return response()->json([
        //     'message' => 'Form submitted successfully!',
        //     'data' => [
        //         'name' => $name,
        //         'email' => $email,
        //         'phone' => $phone,
        //     ],
        // ]);

        // third way of request data retrieval via all() method

        $data = $request->all();
        return response()->json([
            'message' => 'Form submitted successfully!',
            'data' => $data,
        ]);

    }
}
