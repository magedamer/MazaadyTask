<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salaries')->insert([
            ['department_id' => 1, 'amount' => 50000],
            ['department_id' => 2, 'amount' => 70000],
            ['department_id' => 3, 'amount' => 60000],
            ['department_id' => 4, 'amount' => 55000],
            ['department_id' => 5, 'amount' => 75000],
            ['department_id' => 6, 'amount' => 65000],
            ['department_id' => 7, 'amount' => 80000],
            ['department_id' => 8, 'amount' => 52000],
            ['department_id' => 9, 'amount' => 90000],
            ['department_id' => 10, 'amount' => 58000],
        ]);
    }
}
