<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(
            Student::all()
        );
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return response()->json($student);
    }

    public function show($id)
    {
        return response()->json(
            Student::find($id)
        );
    }

    public function update(Request $request,$id)
    {
        $student = Student::find($id);

        $student->update([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return response()->json($student);
    }

    public function destroy($id)
    {
        Student::destroy($id);

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}