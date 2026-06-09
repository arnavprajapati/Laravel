<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    // // Show Data
    // public function index()
    // {
    //     $students = DB::table('students')->get();

    //     return view('students.index', compact('students'));
    // }

    // // Add Form
    // public function create()
    // {
    //     return view('students.create');
    // }

    // // Insert
    // public function store(Request $request)
    // {
    //     DB::table('students')->insert([
    //         'name' => $request->name,
    //         'age' => $request->age,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     return redirect('/students');
    // }

    // // Edit Form
    // public function edit($id)
    // {
    //     $student = DB::table('students')
    //                 ->where('id',$id)
    //                 ->first();

    //     return view('students.edit', compact('student'));
    // }

    // // Update
    // public function update(Request $request,$id)
    // {
    //     DB::table('students')
    //         ->where('id',$id)
    //         ->update([
    //             'name' => $request->name,
    //             'age' => $request->age,
    //             'updated_at' => now()
    //         ]);

    //     return redirect('/students');
    // }

    // // Delete
    // public function destroy($id)
    // {
    //     DB::table('students')
    //         ->where('id',$id)
    //         ->delete();

    //     return redirect('/students');
    // }

    // READ
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // CREATE FORM
    public function create()
    {
        return view('students.create');
    }

    // INSERT
    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return redirect('/students');
    }

    // EDIT FORM
    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->update([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return redirect('/students');
    }

    // DELETE
    public function destroy($id)
    {
        Student::destroy($id);

        return redirect('/students');
    }
}
