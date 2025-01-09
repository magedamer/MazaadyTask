<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    
    public function submit(Request $request)
    {
        // Validate the input
        $request->validate(['number' => 'required|integer|min:5|max:50']);
        $n = $request->number;

        // Get the distinct highest salaries in descending order
        $salaries = DB::table('employees')
            ->join('department_employee', 'employees.id', '=', 'department_employee.employee_id')
            ->join('salaries', 'department_employee.department_id', '=', 'salaries.department_id')
            ->select(DB::raw('MAX(salaries.amount) as highest_salary'))
            ->groupBy('employees.id')
            ->orderBy('highest_salary', 'desc')
            ->pluck('highest_salary');

        // Get the Nth highest salary
        $nthHighestSalary = $salaries->unique()->values()->get($n - 1);

        // Fetch all employees with the Nth highest salary
        $employeesWithNthSalary = DB::table('employees')
            ->join('department_employee', 'employees.id', '=', 'department_employee.employee_id')
            ->join('salaries', 'department_employee.department_id', '=', 'salaries.department_id')
            ->select('employees.id', 'employees.name', 'employees.email', DB::raw('MAX(salaries.amount) as highest_salary'))
            ->groupBy('employees.id', 'employees.name', 'employees.email')
            ->having('highest_salary', '=', $nthHighestSalary)
            ->get();

        return view('salary', compact('employeesWithNthSalary', 'n', 'nthHighestSalary'));
    }
}
