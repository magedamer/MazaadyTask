<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Employee;

class EmployeeCreationTest extends TestCase
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
    public function it_creates_an_employee()
    {
        // Arrange: Prepare employee data
        $data = [
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
        ];

        // Act: Send a POST request to create an employee
        $response = $this->post('/employees', $data);

        // Assert: Check if the employee was created
        $this->assertDatabaseHas('employees', $data);
        $response->assertStatus(201); // Assuming the route returns a 201 status code
    }
}
