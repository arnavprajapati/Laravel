<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    // a) Set cookie city = Mumbai (expires in 60 minutes)
    public function setCity()
    {
        $cookie = cookie('city', 'Mumbai', 60);
        return response()
            ->view('cookies.set')
            ->cookie($cookie);
    }

    // a + b) Retrieve city cookie; show "Cookie not found" if missing
    public function getCity(Request $request)
    {
        $city = $request->cookie('city');
        return view('cookies.get', ['city' => $city]);
    }

    // c) Set multiple cookies using Cookie::queue()
    public function queueMultiple()
    {
        Cookie::queue('name', 'Arnav', 60);
        Cookie::queue('email', 'arnav@example.com', 60);
        return view('cookies.queue');
    }

    // d) Show welcome form
    public function showWelcomeForm(Request $request)
    {
        $name = $request->cookie('welcome_name');
        return view('cookies.welcome', ['name' => $name]);
    }

    // d) Store entered name in cookie
    public function storeWelcomeName(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100']);
        $cookie = cookie('welcome_name', $request->input('name'), 60);
        return redirect()->route('cookie.welcome')->cookie($cookie);
    }

    // e) Show login form
    public function showLoginForm(Request $request)
    {
        $userId = $request->cookie('user_id');
        return view('cookies.login', ['userId' => $userId]);
    }

    // e) Login: store user_id in cookie
    public function login(Request $request)
    {
        $request->validate(['user_id' => 'required|integer|min:1']);
        $cookie = cookie('user_id', $request->input('user_id'), 60);
        return redirect()->route('cookie.profile')->cookie($cookie);
    }

    // e) Profile: show logged-in user_id from cookie
    public function profile(Request $request)
    {
        $userId = $request->cookie('user_id');
        return view('cookies.profile', ['userId' => $userId]);
    }

    // e) Logout: delete the user_id cookie
    public function logout()
    {
        return redirect()->route('cookie.login')
            ->withCookie(Cookie::forget('user_id'));
    }
}
