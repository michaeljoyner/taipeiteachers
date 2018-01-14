<?php

namespace Tests\Feature\Schools;

use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewAdminSchoolsIndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_logged_in_user_can_view_the_schools()
    {
        $this->disableExceptionHandling();
        $schoolA = factory(School::class)->create();
        $schoolB = factory(School::class)->create();

        $response = $this->asLoggedInUser()->get('/admin/schools');
        $response->assertStatus(200);

        $schools = $response->original->getData()['schools'];

        $this->assertTrue($schools->contains($schoolA));
        $this->assertTrue($schools->contains($schoolB));
    }
}