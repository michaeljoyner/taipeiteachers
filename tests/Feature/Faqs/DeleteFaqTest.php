<?php


namespace Tests\Feature\Faqs;


use App\Faqs\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteFaqTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_faq_may_be_deleted()
    {
        $this->disableExceptionHandling();

        $faq = factory(Faq::class)->create();

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/faqs/{$faq->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('faqs', ['id' => $faq->id]);
    }
}