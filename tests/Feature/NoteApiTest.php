<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteApiTest extends TestCase
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
    public function it_creates_and_retrieves_a_note()
    {
        // Arrange: Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a folder
        $folder = Folder::create(['name' => 'Work', 'user_id' => $user->id]);

        // Note data
        $noteData = [
            'name' => 'Meeting Notes',
            'body' => 'Discuss project updates.',
            'type' => 'text',
            'folder_id' => $folder->id,
        ];

        // Act: Send a POST request to create a note
        $response = $this->post('/notes', $noteData);

        // Assert: Check if the note was created
        $this->assertDatabaseHas('notes', $noteData);
        $response->assertStatus(201); // Assuming the route returns a 201 status code

        // Act: Retrieve the note
        $response = $this->get('/notes/' . $response->json('id'));

        // Assert: Check if the retrieved note matches the created note
        $response->assertStatus(200);
        $response->assertJson($noteData);
    }
}
