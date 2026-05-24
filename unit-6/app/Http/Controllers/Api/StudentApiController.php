<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\mongoDbConfig;

class StudentApiController extends Controller
{
    public function insert()
    {
        $student = mongoDbConfig::create([
            'name' => 'API Arnav',
            'email' => 'api@gmail.com',
            'phone' => '9999999999'
        ]);

        return response()->json([
            'message' => 'Data Inserted',
            'data' => $student
        ]);
    }
    public function read()
    {
        $data = mongoDbConfig::all();

        return response()->json($data);
    }
    public function update($id)
    {
        mongoDbConfig::where('_id', $id)
            ->update([
                'name' => 'Updated API'
            ]);

        return response()->json([
            'message' => 'Data Updated'
        ]);
    }
    public function delete($id)
    {
        mongoDbConfig::where('_id', $id)->delete();

        return response()->json([
            'message' => 'Data Deleted'
        ]);
    }
}
