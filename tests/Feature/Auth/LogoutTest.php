<?php


namespace Tests\Feature\Auth;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_logged_in_user_can_be_logged_out()
    {
        $response = $this->asLoggedInUser()->post("/admin/logout");
        $response->assertStatus(302);
        $response->assertRedirect("/");

        $this->assertFalse(auth()->check());
    }
}