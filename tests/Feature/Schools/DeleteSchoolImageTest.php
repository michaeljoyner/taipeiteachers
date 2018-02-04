<?php


namespace Tests\Feature\Schools;


use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DeleteSchoolImageTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_schools_image_can_be_deleted()
    {
        $this->disableExceptionHandling();
        Storage::fake('media');

        $school = factory(School::class)->create();
        $image = $school->addImage(UploadedFile::fake()->image('testpic.jpg'));

        $response = $this->asLoggedInUser()->json('DELETE', "/admin/schools/{$school->id}/image");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('media', ['id' => $image->id]);

    }
}