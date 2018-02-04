<?php


namespace Tests\Feature\Schools;


use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AddSchoolImageTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_image_can_be_uploaded_and_attached_to_a_school()
    {
        Storage::fake('media');
        $this->disableExceptionHandling();

        $school = factory(School::class)->create();

        $response = $this->asLoggedInUser()->json('POST', "/admin/schools/{$school->id}/image", [
            'image' => UploadedFile::fake()->image('testpic.jpg')
        ]);

        $response->assertStatus(200);


        $this->assertCount(1, $school->fresh()->getMedia(School::MAIN_IMG));
    }

    /**
     *@test
     */
    public function the_response_returns_the_stored_image_src()
    {
        Storage::fake('media');
        $this->disableExceptionHandling();

        $school = factory(School::class)->create();

        $response = $this->asLoggedInUser()->json('POST', "/admin/schools/{$school->id}/image", [
            'image' => UploadedFile::fake()->image('testpic.jpg')
        ]);

        $response->assertStatus(200);
        $url = $school->fresh()->getFirstMedia(School::MAIN_IMG)->getUrl('thumb');

        $this->assertEquals(['image_src' => $url], $response->decodeResponseJson());
    }

    /**
     *@test
     */
    public function adding_a_second_image_will_get_rid_of_the_first()
    {
        Storage::fake('media');
        $this->disableExceptionHandling();

        $school = factory(School::class)->create();
        $first_image = $school->addImage(UploadedFile::fake()->image('first_image.jpg', 10));
        $this->assertDatabaseHas('media', ['id' => $first_image->id]);

        $response = $this->asLoggedInUser()->json('POST', "/admin/schools/{$school->id}/image", [
            'image' => UploadedFile::fake()->image('second_image.png', 20)
        ]);

        $response->assertStatus(200);
        $this->assertCount(1, $school->fresh()->getMedia(School::MAIN_IMG));

        $this->assertDatabaseMissing('media', ['id' => $first_image->id]);
    }

    /**
     *@test
     */
    public function the_image_is_required()
    {
        Storage::fake('media');
        $school = factory(School::class)->create();

        $response = $this->asLoggedInUser()->json('POST', "/admin/schools/{$school->id}/image", [
            'image' => ''
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('image');
    }

    /**
     *@test
     */
    public function the_image_must_be_an_image_file()
    {
        Storage::fake('media');
        $school = factory(School::class)->create();

        $response = $this->asLoggedInUser()->json('POST', "/admin/schools/{$school->id}/image", [
            'image' => 'not-an-image-file'
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('image');
    }

    /**
     *@test
     */
    public function the_image_must_be_an_acceptable_file_type()
    {
        Storage::fake('media');
        $school = factory(School::class)->create();

        $response = $this->asLoggedInUser()->json('POST', "/admin/schools/{$school->id}/image", [
            'image' => UploadedFile::fake()->create('not_image.txt', 100)
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('image');
    }
}