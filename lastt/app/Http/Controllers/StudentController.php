<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // Show Data
    public function index()
    {
        $students = DB::table('students')->get();

        return view('students.index', compact('students'));
    }

    // Add Form
    public function create()
    {
        return view('students.create');
    }

    // Insert
    public function store(Request $request)
    {
        DB::table('students')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/students');
    }

    // Edit Form
    public function edit($id)
    {
        $student = DB::table('students')
                    ->where('id',$id)
                    ->first();

        return view('students.edit', compact('student'));
    }

    // Update
    public function update(Request $request,$id)
    {
        DB::table('students')
            ->where('id',$id)
            ->update([
                'name' => $request->name,
                'age' => $request->age,
                'updated_at' => now()
            ]);

        return redirect('/students');
    }

    // Delete
    public function destroy($id)
    {
        DB::table('students')
            ->where('id',$id)
            ->delete();

        return redirect('/students');
    }
}