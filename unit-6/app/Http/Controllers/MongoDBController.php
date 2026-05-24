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
}
