<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

use MongoDB\Laravel\Eloquent\Model;

class Student extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'students';
    protected $fillable = [
        'name',
        'age'
    ];
}
