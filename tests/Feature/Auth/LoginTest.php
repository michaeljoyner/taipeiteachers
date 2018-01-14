<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function the_login_page_may_be_accessed()
    {
        $this->disableExceptionHandling();
        $response = $this->get("/admin/login");
        $response->assertStatus(200);

        $response->assertSee('name="email"');
        $response->assertSee('name="password"');
    }

    /**
     *@test
     */
    public function a_user_can_be_logged_in()
    {
        $user = factory(User::class)->create(['email' => 'test@example.com', 'password' => bcrypt('password')]);

        $response = $this->post("/admin/login", [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect("/admin");

        $this->assertTrue(auth()->user()->is($user));
    }

    /**
     *@test
     */
    public function invalid_credentials_cannot_be_used_to_login()
    {
        $response = $this->post("/admin/login", [
            'email' => 'not@existant.com',
            'password' => 'unreal_password'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect("/");

        $this->assertFalse(auth()->check());
    }
}