<?php


namespace Tests\Feature\Faqs;


use App\Faqs\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateFaqTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_faq_can_be_updated()
    {
        $this->disableExceptionHandling();
        $faq = factory(Faq::class)->create([
            'question' => 'Old Question',
            'short_answer' => 'Old Short Answer',
            'full_answer' => 'Old Full Answer'
        ]);

        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs/{$faq->id}", [
            'question' => 'New Question',
            'short_answer' => 'New Short Answer',
            'full_answer' => 'New Full Answer'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'question' => 'New Question',
            'short_answer' => 'New Short Answer',
            'full_answer' => 'New Full Answer'
        ]);
    }

    /**
     *@test
     */
    public function updating_a_faq_responds_with_the_updated_data()
    {
        $this->disableExceptionHandling();
        $faq = factory(Faq::class)->create([
            'question' => 'Old Question',
            'short_answer' => 'Old Short Answer',
            'full_answer' => 'Old Full Answer'
        ]);

        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs/{$faq->id}", [
            'question' => 'New Question',
            'short_answer' => 'New Short Answer',
            'full_answer' => 'New Full Answer'
        ]);

        $response->assertStatus(200);
        $this->assertEquals($faq->fresh()->toArray(), $response->decodeResponseJson());
    }

    /**
     *@test
     */
    public function the_question_is_required()
    {
        $faq = factory(Faq::class)->create();
        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs/{$faq->id}", [
            'question' => '',
            'short_answer' => 'Test Short Answer',
            'full_answer' => 'Test Full Answer'
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('question');
    }

    /**
     *@test
     */
    public function the_short_answer_is_required()
    {
        $faq = factory(Faq::class)->create();
        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs/{$faq->id}", [
            'question' => 'Test Question',
            'short_answer' => '',
            'full_answer' => 'Test Full Answer'
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('short_answer');
    }

    /**
     *@test
     */
    public function the_full_answer_is_not_required()
    {
        $this->disableExceptionHandling();

        $faq = factory(Faq::class)->create();
        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs/{$faq->id}", [
            'question' => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer' => ''
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'question' => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer' => null
        ]);
    }
}