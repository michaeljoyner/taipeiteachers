<?php


namespace Tests\Unit\Schools;


use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\Models\Media;
use Tests\TestCase;

class SchoolImageTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_image_can_be_added_to_a_school()
    {
        Storage::fake('media');

        $school = factory(School::class)->create();
        $image = $school->addImage(UploadedFile::fake()->image('testpic.jpg'));

        $this->assertInstanceOf(Media::class, $image);
        $this->assertTrue($school->fresh()->getFirstMedia(School::MAIN_IMG)->is($image));
    }

    /**
     *@test
     */
    public function adding_an_image_creates_a_thumb_conversion()
    {
        Storage::fake('media');

        $school = factory(School::class)->create();
        $image = $school->addImage(UploadedFile::fake()->image('testpic.jpg'));

        $this->assertInstanceOf(Media::class, $image);
        $this->assertNotNull($image->getPath('thumb'));
        $this->assertNotNull($image->getPath());
        $this->assertNotEquals($image->getPath('thumb'), $image->getPath());
    }


    /**
     *@test
     */
    public function a_schools_image_may_be_cleared()
    {
        Storage::fake('media');

        $school = factory(School::class)->create();
        $image = $school->addImage(UploadedFile::fake()->image('testpic.jpg'));

        $school->clearImage();
        Storage::disk('media')->assertMissing($image->getPath());
        $this->assertNull($image->fresh());
    }

    /**
     *@test
     */
    public function a_school_can_provide_the_url_for_its_main_image()
    {
        Storage::fake('media');

        $school = factory(School::class)->create();
        $image = $school->addImage(UploadedFile::fake()->image('testpic.jpg'));

        $this->assertEquals($image->getUrl(), $school->imageUrl());
        $this->assertEquals($image->getUrl('thumb'), $school->imageUrl('thumb'));
    }

    /**
     *@test
     */
    public function if_the_school_has_no_image_the_image_url_will_be_an_empty_string()
    {
        Storage::fake('media');

        $school = factory(School::class)->create();
        $this->assertCount(0, $school->getMedia());

        $this->assertEquals('', $school->imageUrl());
        $this->assertEquals('', $school->imageUrl('thumb'));
    }
}