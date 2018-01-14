<?php


namespace Tests\Feature\Schools;


use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateSchoolTest extends TestCase
{
    use RefreshDatabase, TestsSchoolValidation;

    private $post_url;
    private $school;

    public function setUp()
    {
        parent::setUp();

        $this->school = factory(School::class)->create([
            'name' => 'old name',
            'address' => 'old address',
            'telephone' => 'old telephone',
            'city' => 'old city',
            'email' => 'old@email.test',
            'website' => 'http://old-website.test',
            'photo_url' => 'http://example.test/old_photo_url.jpg',
            'latitude' => '11',
            'longitude' => '11',
            'contact_person' => 'old contact_person'
        ]);

        $this->post_url = "/admin/schools/{$this->school->id}";
    }
    
    /**
     *@test
     */
    public function a_school_can_be_updated()
    {
        $this->disableExceptionHandling();

        $new_school_data = [
            'name' => 'new name',
            'address' => 'new address',
            'telephone' => 'new telephone',
            'city' => 'new city',
            'email' => 'new@email.test',
            'website' => 'http://new-website.test',
            'photo_url' => 'http://example.test/new_photo_url.jpg',
            'latitude' => '22',
            'longitude' => '22',
            'contact_person' => 'new contact_person'
        ];

        $response = $this->asLoggedInUser()->json("POST", $this->post_url, $new_school_data);
        $response->assertStatus(200);
        $this->assertEquals($this->school->fresh()->toJsonableArray(), $response->decodeResponseJson());


        $this->assertDatabaseHas('schools', $new_school_data);
    }

    /**
     *@test
     */
    public function updating_a_school_requires_valid_data()
    {
        $this->assertFieldRequired('name');
        $this->assertFieldRequired('latitude');
        $this->assertFieldRequired('longitude');

        $this->assertFieldIsValidEmail('email');
        $this->assertFieldIsValidUrl('website');
        $this->assertFieldIsValidUrl('photo_url');

        $this->assertFieldInvalidIfLessThan('latitude', 90);
        $this->assertFieldInvalidIfLessThan('longitude', -180);

        $this->assertFieldInvalidIfGreaterThan('latitude', 90);
        $this->assertFieldInvalidIfGreaterThan('longitude', 180);

        $this->assertFieldIsNotTooLong('name');
        $this->assertFieldIsNotTooLong('email');
        $this->assertFieldIsNotTooLong('address');
        $this->assertFieldIsNotTooLong('contact_person');
        $this->assertFieldIsNotTooLong('telephone');
        $this->assertFieldIsNotTooLong('photo_url');
        $this->assertFieldIsNotTooLong('website');
        $this->assertFieldIsNotTooLong('city');
    }
}