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
}
