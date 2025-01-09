<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'HR'],
            ['name' => 'Engineering'],
            ['name' => 'Sales'],
            ['name' => 'Marketing'],
            ['name' => 'Finance'],
            ['name' => 'IT Support'],
            ['name' => 'Research and Development'],
            ['name' => 'Customer Service'],
            ['name' => 'Legal'],
            ['name' => 'Administration'],
        ]);
    }
}
