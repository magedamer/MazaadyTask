<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com'],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com'],
            ['name' => 'Charlie Davis', 'email' => 'charlie@example.com'],
            ['name' => 'Diana Evans', 'email' => 'diana@example.com'],
            ['name' => 'Ethan Foster', 'email' => 'ethan@example.com'],
            ['name' => 'Fiona Green', 'email' => 'fiona@example.com'],
            ['name' => 'George Harris', 'email' => 'george@example.com'],
            ['name' => 'Hannah Ivers', 'email' => 'hannah@example.com'],
        ]);
    }
}
