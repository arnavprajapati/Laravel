<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class mongoDbConfig extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'student';

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];
}