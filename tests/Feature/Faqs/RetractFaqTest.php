<?php


namespace Tests\Feature\Faqs;


use App\Faqs\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RetractFaqTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_faq_may_be_retracted()
    {
        $this->disableExceptionHandling();

        $faq = factory(Faq::class)->create(['published' => true]);

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/published-faqs/{$faq->id}");
        $response->assertStatus(200);

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'published' => false
        ]);
    }
}