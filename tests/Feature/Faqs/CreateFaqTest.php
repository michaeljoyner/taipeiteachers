<?php

namespace Tests\Feature\Faqs;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateFaqTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_faq_can_be_created()
    {
        $this->disableExceptionHandling();

        $faq_data = [
            'question' => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer' => 'Test Full Answer'
        ];

        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs", $faq_data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('faqs', $faq_data);
    }

    /**
     *@test
     */
    public function the_question_is_required()
    {
        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs", [
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
        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs", [
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

        $response = $this->asLoggedInUser()->json("POST", "/admin/faqs", [
            'question' => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer' => ''
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('faqs', [
            'question' => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer' => null
        ]);
    }
}