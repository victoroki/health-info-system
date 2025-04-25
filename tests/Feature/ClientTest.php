<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\HealthProgram;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_client_creation()
    {
        $program = HealthProgram::factory()->create();
        $response = $this->post('/clients', [
            'name' => 'Test Client',
            'email' => 'test@example.com',
            'dob' => '1990-01-01',
            'phone' => '1234567890',
            'programs' => [$program->id],
        ]);

        $response->assertRedirect(route('clients.index'));
        $this->assertDatabaseHas('clients', ['email' => 'test@example.com']);
    }
}
