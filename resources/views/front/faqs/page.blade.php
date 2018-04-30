@extends('front.base')

@section('content')
    <div class="pb-28 pt-40 px-4 md:px-0">
        <h1 class="text-4xl max-w-xl mx-auto text-site-secondary font-cursive">Frequently Asked Questions</h1>
        <section>
            <h3 class="my-20 text-2xl max-w-xl mx-auto text-site-secondary font-cursive">
                Common questions answered by those with real experience.
            </h3>
            <p class="max-w-lg text-lg text-site-secondary mt-12 mx-auto">
                Everybody has questions when the first start out, and fortunately for you, we at Taipeiteachers.com have
                already had those questions answered by years of experience, and from our community of real teachers
                living and working in Taipei. If you have a question that is not asked here, feel free to <a href="" class="text-site-primary font-bold">just ask a teacher</a>.
            </p>

        </section>
        <div class="max-w-lg mx-auto py-20">
            @foreach($faqs as $faq)
            <faq-answer question="{{ $faq['question'] }}"
                        short-answer="{{ $faq['short_answer'] }}"
                        full-answer="{{ $faq['full_answer'] }}"
                        link="/faqs/{{ $faq['slug'] }}"
            ></faq-answer>
            @endforeach
        </div>
    </div>
    <portal-target name="faq-modals"></portal-target>
@endsection