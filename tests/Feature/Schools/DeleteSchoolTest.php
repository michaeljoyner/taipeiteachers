<?php


namespace Tests\Feature\Schools;


use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteSchoolTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_school_can_be_deleted()
    {
        $this->disableExceptionHandling();
        $school = factory(School::class)->create();

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/schools/{$school->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('schools', ['id' => $school->id]);
    }
}