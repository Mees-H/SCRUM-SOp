<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->make();
        $user->role = 'admin';
        $user->save();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'role' => 'admin',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->make();
        $user->role = 'admin';
        $user->save();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
            'role' => 'admin',
        ]);

        $this->assertGuest();
    }
}
