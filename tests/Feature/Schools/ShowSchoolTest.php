<?php


namespace Tests\Feature\Schools;


use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowSchoolTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_single_school_can_be_viewed()
    {
        $this->disableExceptionHandling();
        $school = factory(School::class)->create();

        $response = $this->asLoggedInUser()->get("/admin/schools/{$school->id}");
        $response->assertStatus(200);

        $viewData = $response->original->getData();

        $this->assertEquals($school->toJsonableArray(), $viewData['school']);
    }
}