<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class ManualAuthTaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_successful_registration()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
        $response->assertRedirect('/tasks');
        $this->assertTrue(session()->has('user_id'));
    }

    public function test_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertFalse(session()->has('user_id'));
    }

    public function test_accessing_tasks_without_session_redirects_to_login()
    {
        $response = $this->get('/tasks');
        $response->assertRedirect('/login');
    }

    public function test_updating_profile()
    {
        $user = User::factory()->create();

        $response = $this->withSession(['user_id' => $user->id])
            ->put('/profile', [
                'name' => 'Updated Name',
                'email' => $user->email, // keep same email
            ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_creating_and_deleting_task()
    {
        $user = User::factory()->create();

        // Create Task
        $response = $this->withSession(['user_id' => $user->id])
            ->post('/tasks', [
                'title' => 'New Task',
                'description' => 'Task Description',
            ]);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', [
            'title' => 'New Task',
            'user_id' => $user->id,
        ]);

        $task = Task::where('title', 'New Task')->first();

        // Delete Task
        $response = $this->withSession(['user_id' => $user->id])
            ->delete("/tasks/{$task->id}");

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
