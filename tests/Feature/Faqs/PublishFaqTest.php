<?php


namespace Tests\Feature\Faqs;


use App\Faqs\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublishFaqTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_faq_may_be_published()
    {
        $this->disableExceptionHandling();

        $faq = factory(Faq::class)->create(['published' => false]);

        $response = $this->asLoggedInUser()->json("POST", "/admin/published-faqs", [
            'faq_id' => $faq->id
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'published' => true
        ]);
    }
}