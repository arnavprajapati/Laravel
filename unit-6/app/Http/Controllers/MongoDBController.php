<?php

namespace App\Http\Controllers;

use App\Models\mongoDbConfig;
use Illuminate\Http\Request;

class MongoDBController extends Controller
{
    public function insert()
    {
        mongoDbConfig::create([
            'name' => 'Mongo Arnav',
            'email' => 'mongo@gmail.com',
            'phone' => '7777777777'
        ]);

        return "MongoDB Connected Successfully";
    }

    public function read()
    {
        $data = mongoDbConfig::all();
        return $data;
    }

    public function updateData()
    {
        mongoDbConfig::where('name', 'Arnav')
            ->update([
                'name' => 'Updated Arnav'
            ]);

        return "Data Updated";
    }

    public function deleteData()
    {
        mongoDbConfig::where('name', 'Updated Arnav')
            ->delete();

        return "Data Deleted";
    }
}
