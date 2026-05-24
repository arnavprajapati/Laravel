<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class OnboardController extends Controller
{
    public function showForm()
    {
        return view('OnboardForm');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z ]+$/', 'min:5', 'max:10'],
            'email' => ['required', 'email', 'regex:/^[A-Za-z0-9._%+-]+@google\\.com$/', 'unique:users,email'],
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'
            ],
            'phone' => ['required', 'digits:10', 'numeric'],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(24)->format('Y-m-d')],
        ], [
            'name.regex' => 'Name must contain only alphabets and spaces.',
            'name.min' => 'Name must be at least 5 characters.',
            'name.max' => 'Name must not exceed 10 characters.',
            'email.regex' => 'Email must be a valid @google.com address.',
            'email.unique' => 'This email is already registered.',
            'password.regex' => 'Password must contain uppercase, lowercase, number, and special character.',
            'password.confirmed' => 'Passwords do not match.',
            'phone.digits' => 'Phone number must be exactly 10 digits.',
            'dob.before_or_equal' => 'Employee must be at least 24 years old.'
        ]);

        // Save user or perform onboarding logic here
        // User::create([...]);

        return back()->with('success', 'Employee onboarded successfully!');
    }
}
