<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Salary;

class SalaryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    use RefreshDatabase;

    /** @test */
    public function it_retrieves_employees_with_nth_highest_salary()
    {
        // Arrange: Create departments and salaries
        $department1 = Department::create(['name' => 'HR']);
        $department2 = Department::create(['name' => 'Engineering']);
        $department3 = Department::create(['name' => 'Sales']);

        Salary::create(['department_id' => $department1->id, 'amount' => 50000]);
        Salary::create(['department_id' => $department2->id, 'amount' => 70000]);
        Salary::create(['department_id' => $department3->id, 'amount' => 60000]);

        // Create employees
        $employee1 = Employee::create(['name' => 'John Doe', 'email' => 'john@example.com']);
        $employee2 = Employee::create(['name' => 'Jane Smith', 'email' => 'jane@example.com']);

        // Associate employees with departments
        $employee1->departments()->attach($department1);
        $employee2->departments()->attach($department2);

        // Act: Submit a request to get the 2nd highest salary
        $response = $this->post('/salary/submit', ['number' => 2]);

        // Assert: Check if the response contains the correct employees
        $response->assertStatus(200);
        $response->assertSee('Jane Smith'); // Should see the employee with the 2nd highest salary
        $response->assertDontSee('John Doe'); // Should not see the employee with the 1st highest salary
    }
}
