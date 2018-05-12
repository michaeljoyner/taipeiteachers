<?php


namespace Tests\Feature\InfoLinks;


use App\InfoLinks\InfoLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateInfoLinkTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_info_link_may_be_updated()
    {
        $this->disableExceptionHandling();
        $info_link = factory(InfoLink::class)->create([
            'title'     => 'Old Title',
            'content'   => 'Old Content',
            'link'      => 'https://old.test',
            'link_text' => 'old.test',
            'topic'     => 'Old topic'
        ]);

        $update_data = [
            'title'     => 'New Title',
            'content'   => 'New Content',
            'link'      => 'https://new.test',
            'link_text' => 'new.test',
            'topic'     => 'New topic'
        ];

        $response = $this->asLoggedInUser()->json("POST", "/admin/info-links/{$info_link->id}", $update_data);
        $response->assertStatus(200);

        $this->assertDatabaseHas('info_links', [
            'id' => $info_link->id,
            'title'     => 'New Title',
            'content'   => 'New Content',
            'link'      => 'https://new.test',
            'link_text' => 'new.test',
            'topic'     => 'New topic'
        ]);
    }

    /**
     *@test
     */
    public function updating_an_info_link_responds_with_the_fresh_data()
    {
        $this->disableExceptionHandling();
        $info_link = factory(InfoLink::class)->create();

        $update_data = [
            'title'     => 'New Title',
            'content'   => 'New Content',
            'link'      => 'https://new.test',
            'link_text' => 'new.test',
            'topic'     => 'New topic'
        ];

        $response = $this->asLoggedInUser()->json("POST", "/admin/info-links/{$info_link->id}", $update_data);
        $response->assertStatus(200);

        $this->assertEquals($info_link->fresh()->toArray(), $response->decodeResponseJson());
    }

    /**
     *@test
     */
    public function the_title_is_required()
    {
        $this->assertFieldIsInvalid(['title' => '']);
    }

    /**
     *@test
     */
    public function the_content_is_required()
    {
        $this->assertFieldIsInvalid(['content' => '']);
    }

    /**
     *@test
     */
    public function the_link_is_required()
    {
        $this->assertFieldIsInvalid(['link' => '']);
    }

    /**
     *@test
     */
    public function the_link_must_be_a_valid_url()
    {
        $this->assertFieldIsInvalid(['link' => 'NOT A URL']);
    }

    /**
     *@test
     */
    public function the_link_text_is_required()
    {
        $this->assertFieldIsInvalid(['link_text' => '']);
    }

    /**
     *@test
     */
    public function the_topic_is_required()
    {
        $this->assertFieldIsInvalid(['topic' => '']);
    }

    private function assertFieldIsInvalid($invalid_field)
    {
        $link = factory(InfoLink::class)->create();
        $response = $this->asLoggedInUser()->json("POST", "/admin/info-links/{$link->id}", array_merge([
            'title'     => 'New Title',
            'content'   => 'New Content',
            'link'      => 'https://new.test',
            'link_text' => 'new.test',
            'topic'     => 'New topic'
        ], $invalid_field));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(array_keys($invalid_field)[0]);
    }
}