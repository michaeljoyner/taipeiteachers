<?php


namespace Tests\Feature\Schools;


trait TestsSchoolValidation
{
    private function assertFieldRequired($field)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", $this->post_url, $this->standardSchoolData([
                             $field => ''
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }

    private function assertFieldInvalidIfLessThan($field, $value)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", $this->post_url, $this->standardSchoolData([
                             $field => ($value - 1)
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }

    private function assertFieldInvalidIfGreaterThan($field, $value)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", $this->post_url, $this->standardSchoolData([
                             $field => ($value + 1)
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }

    private function assertFieldIsValidUrl($field)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", $this->post_url, $this->standardSchoolData([
                             $field => 'NOT A VALID URL'
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }

    protected function assertFieldIsValidEmail($field)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", $this->post_url, $this->standardSchoolData([
                             $field => 'NOT A VALID EMAIL'
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }

    private function assertFieldIsNotTooLong($field, $length = 256)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", $this->post_url, $this->standardSchoolData([
                             $field => str_repeat('X', $length)
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }

    private function assertFieldIsOptional($field)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", $this->post_url, $this->standardSchoolData([
                             $field => ''
                         ]));
        $response->assertStatus(200);
    }

    private function standardSchoolData($overrides = [])
    {
        return array_merge([
            'name'           => 'TEST SCHOOL NAME',
            'address'        => 'TEST ADDRESS',
            'telephone'      => 'TEST TELEPHONE',
            'city'           => 'TEST CITY',
            'email'          => 'test@example.test',
            'website'        => 'http://www.example.test',
            'photo_url'      => 'http://example.test/image.jpg',
            'latitude'       => 66,
            'longitude'      => 66,
            'contact_person' => 'joe soap'
        ], $overrides);
    }
}