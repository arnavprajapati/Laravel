<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function insert()
    {
        Student::create([
            'name' => 'Arnav',
            'email' => 'arnav@gmail.com',
            'phone' => '9999999999'
        ]);

        return "Eloquent Inserted";
    }

    public function read()
    {
        $students = Student::all();
        return $students;
    }

    public function updateData()
    {
        $student = Student::find(1);
        $student->update([
            'name' => 'Updated Arnav'
        ]);

        return "Data Updated";
    }

    public function deleteData()
    {
        $student = Student::find(1);
        $student->delete();

        return "Data Deleted";
    }
}
