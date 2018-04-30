<?php


namespace Tests\Feature\Faqs;


use App\Faqs\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateFaqBodyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function the_full_answer_text_of_a_faq_can_be_updated()
    {
        $this->disableExceptionHandling();

        $faq = factory(Faq::class)->create([
            'question'     => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer'  => 'Old Full Answer'
        ]);

        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs/{$faq->id}/full-answer", [
            'body' => 'New Full Answer'
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'question'     => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer'  => 'New Full Answer'
        ]);
    }
}