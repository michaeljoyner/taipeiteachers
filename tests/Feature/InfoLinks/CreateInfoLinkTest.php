<?php

namespace Tests\Feature\InfoLinks;

use App\InfoLinks\InfoLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateInfoLinkTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_info_link_can_be_created()
    {
        $this->disableExceptionHandling();
        $info_data = [
            'title'     => 'Test Title',
            'content'   => 'Test Content',
            'link'      => 'https://test.test',
            'link_text' => 'test.test',
            'topic'     => 'test topic'
        ];

        $response = $this->asLoggedInUser()->json("POST", "/admin/info-links", $info_data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('info_links', $info_data);
    }

    /**
     *@test
     */
    public function storing_a_new_info_link_responds_with_new_data()
    {
        $this->disableExceptionHandling();
        $info_data = [
            'title'     => 'Test Title',
            'content'   => 'Test Content',
            'link'      => 'https://test.test',
            'link_text' => 'test.test',
            'topic'     => 'test topic'
        ];

        $response = $this->asLoggedInUser()->json("POST", "/admin/info-links", $info_data);
        $response->assertStatus(201);

        $this->assertCount(1, InfoLink::all());
        $stored_link = InfoLink::first();

        $this->assertEquals($stored_link->toArray(), $response->decodeResponseJson());

    }

    /**
     * @test
     */
    public function the_title_is_required()
    {
        $this->assertFieldIsRequired('title');
    }

    /**
     *@test
     */
    public function the_content_is_required()
    {
        $this->assertFieldIsRequired('content');
    }

    /**
     *@test
     */
    public function the_link_is_required()
    {
        $this->assertFieldIsRequired('link');
    }

    /**
     *@test
     */
    public function the_link_must_be_a_valid_url()
    {
        $response = $this->asLoggedInUser()->json("POST", "/admin/info-links", [
            'title'     => 'Test Title',
            'content'   => 'Test Content',
            'link'      => 'not a valid url',
            'link_text' => 'test.test',
            'topic'     => 'test topic'
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('link');
    }

    /**
     *@test
     */
    public function the_link_text_is_required()
    {
        $this->assertFieldIsRequired('link_text');
    }

    /**
     *@test
     */
    public function the_topic_is_required()
    {
        $this->assertFieldIsRequired('topic');
    }

    private function assertFieldIsRequired($field)
    {
        $response = $this->asLoggedInUser()->json("POST", "/admin/info-links", array_merge([
            'title'     => 'Test Title',
            'content'   => 'Test Content',
            'link'      => 'https://test.test',
            'link_text' => 'test.test',
            'topic'     => 'test topic'
        ], [$field => '']));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors($field);
    }
}