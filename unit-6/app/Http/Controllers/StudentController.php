<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function insert()
    {
        DB::table('students')->insert([
            'name' => 'Arnav',
            'email' => 'arnav@gmail.com',
            'phone' => '9999999999'
        ]);

        return "Data Inserted Successfully";
    }

    public function read()
    {
        $students = DB::table('students')->get();
        return $students;
    }

    public function updateData()
    {
        DB::table('students')
            ->where('id', 1)
            ->update([
                'name' => 'Updated Arnav'
            ]);

        return "Data Updated";
    }

    public function deleteData()
    {
        DB::table('students')
            ->where('id', 1)
            ->delete();

        return "Data Deleted";
    }
}
