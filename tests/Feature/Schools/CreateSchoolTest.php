<?php

namespace Tests\Feature\Schools;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateSchoolTest extends TestCase
{
    use RefreshDatabase, TestsSchoolValidation;

    private $post_url = "/admin/schools";

    /**
     * @test
     */
    public function a_school_can_be_created()
    {
        $this->disableExceptionHandling();

        $school_data = $this->standardSchoolData();

        $response = $this->asLoggedInUser()->json("POST", $this->post_url, $school_data);
        $response->assertStatus(200);

        $this->assertDatabaseHas('schools', $school_data);
    }

    /**
     *@test
     */
    public function a_school_can_only_be_created_with_valid_data()
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

        $this->assertFieldIsOptional('email');
        $this->assertFieldIsOptional('telephone');
        $this->assertFieldIsOptional('city');
        $this->assertFieldIsOptional('contact_person');
        $this->assertFieldIsOptional('address');
        $this->assertFieldIsOptional('photo_url');
        $this->assertFieldIsOptional('website');
    }





}