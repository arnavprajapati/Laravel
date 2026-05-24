<?php

namespace App\Http\Controllers;

use App\Models\mongoDbConfig;
use Illuminate\Http\Request;

class MongoDBController extends Controller
{
    // public function insert()
    // {
    //     mongoDbConfig::create([
    //         'name' => 'Mongo Arnav',
    //         'email' => 'mongo@gmail.com',
    //         'phone' => '7777777777'
    //     ]);

    //     return "MongoDB Connected Successfully";
    // }

    // public function read()
    // {
    //     $data = mongoDbConfig::all();
    //     return $data;
    // }

    // public function updateData()
    // {
    //     mongoDbConfig::where('name', 'Arnav')
    //         ->update([
    //             'name' => 'Updated Arnav'
    //         ]);

    //     return "Data Updated";
    // }

    // public function deleteData()
    // {
    //     mongoDbConfig::where('name', 'Updated Arnav')
    //         ->delete();

    //     return "Data Deleted";
    // }

    public function index()
    {
        $students = mongoDbConfig::all();

        return view('students', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        mongoDbConfig::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect('/')->with('success', 'Data Inserted');
    }

    public function edit($id)
    {
        $student = mongoDbConfig::find($id);

        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        mongoDbConfig::where('_id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        mongoDbConfig::where('_id', $id)->delete();

        return redirect('/');
    }
}
