<?php


namespace Tests\Feature\InfoLinks;


use App\InfoLinks\InfoLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteInfoLinkTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_info_link_can_be_deleted()
    {
        $this->disableExceptionHandling();

        $info_link = factory(InfoLink::class)->create();

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/info-links/{$info_link->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('info_links', ['id' => $info_link->id]);
    }
}