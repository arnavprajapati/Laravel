<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Arnav',
                'age' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rahul',
                'age' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Amit',
                'age' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
