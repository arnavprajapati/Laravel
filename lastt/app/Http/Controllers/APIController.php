<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Arnav',
            'age' => 20,
            'role' => 'developer'
        ];
        return response()->json($data);
    }
}
