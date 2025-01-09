<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departmentIds = range(1, 10);
        $employeeIds = range(1, 10);

        foreach ($employeeIds as $employeeId) {
            // Randomly assign 1 to 3 departments to each employee
            $randomDepartments = array_rand(array_flip($departmentIds), rand(1, 3));

            foreach ((array)$randomDepartments as $departmentId) {
                DB::table('department_employee')->insert([
                    'employee_id' => $employeeId,
                    'department_id' => $departmentId,
                ]);
            }
        }
    }
}
