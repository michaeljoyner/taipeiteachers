<?php

namespace Tests\Unit\Faqs;

use App\Faqs\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqsTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_newly_created_faq_is_not_published()
    {
        $faq = Faq::create([
            'question' => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer' => 'Test Full Answer'
        ]);

        $this->assertFalse($faq->fresh()->published);
    }

    /**
     *@test
     */
    public function a_faq_can_be_published()
    {
        $faq = factory(Faq::class)->create(['published' => false]);
        $this->assertFalse($faq->fresh()->published);

        $faq->publish();
        $this->assertTrue($faq->fresh()->published);
    }

    /**
     *@test
     */
    public function a_faq_can_be_retracted()
    {
        $faq = factory(Faq::class)->create(['published' => true]);
        $this->assertTrue($faq->fresh()->published);

        $faq->retract();
        $this->assertFalse($faq->fresh()->published);
    }

    /**
     *@test
     */
    public function the_faqs_have_a_published_scope()
    {
        $public = factory(Faq::class)->create(['published' => true]);
        $private = factory(Faq::class)->create(['published' => false]);

        $published = Faq::published()->get();

        $this->assertTrue($published->contains($public));
        $this->assertFalse($published->contains($private));
    }

    /**
     *@test
     */
    public function the_full_answer_of_a_faq_can_be_updated()
    {
        $faq = factory(Faq::class)->create(['full_answer' => 'Old Full Answer']);

        $faq->updateFullAnswer('New Full Answer');

        $this->assertEquals('New Full Answer', $faq->fresh()->full_answer);
    }

    /**
     *@test
     */
    public function a_newly_created_faq_has_a_slug()
    {
        $faq = Faq::create([
            'question' => 'Test Question',
            'short_answer' => 'Test Short Answer',
            'full_answer' => 'Test Full Answer'
        ]);

        $this->assertEquals('test-question', $faq->fresh()->slug);
    }
}