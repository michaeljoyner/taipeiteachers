<?php

namespace Tests\Unit\Schools;

use App\Schools\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_school_can_be_presented_as_jsonable_array()
    {
        $school = factory(School::class)->create([
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
        ]);

        $expected = [
            'id'             => $school->id,
            'name'           => 'TEST SCHOOL NAME',
            'address'        => 'TEST ADDRESS',
            'telephone'      => 'TEST TELEPHONE',
            'city'           => 'TEST CITY',
            'email'          => 'test@example.test',
            'website'        => 'http://www.example.test',
            'photo_url'      => 'http://example.test/image.jpg',
            'latitude'       => 66,
            'longitude'      => 66,
            'latLng'         => ['lat' => 66, 'lng' => 66],
            'contact_person' => 'joe soap'
        ];

        $jsonable_array = $school->toJsonableArray();

        $this->assertEquals($expected, $jsonable_array);


    }
}