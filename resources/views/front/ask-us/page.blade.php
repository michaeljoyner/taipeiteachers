@extends('front.base')

@section('content')
    <section class="pt-20 pb-12 px-4">
        <div class="max-w-lg mx-auto">
            <h1 class="text-2xl md:text-4xl text-site-secondary font-cursive">Ask a Teacher</h1>
            <p class="text-lg text-site-secondary mt-12 mx-auto">
                We have decades of experience, and we are ready to answer your questions? Embarking on a journey to live and teach in a foreign country is no small task, so any questions you have, ask away. Remember, there are no stupid questions, only stupid people.
            </p>
        </div>
    </section>
    <section class="pb-20 max-w-sm mx-auto">
        <form action="" class="px-4">
            <div class="my-6">
                <label class="uppercase block mb-2 tracking-wide text-site-primary font-bold text-sm" for="email_address">What is your email?</label>
                <input class="block border rounded pl-2 h-12 w-full" type="email" placeholder="So we can get back to you">
            </div>
            <div class="my-6">
                <label class="uppercase block mb-2 tracking-loose text-site-primary font-bold text-sm" for="email_address">What is your question?</label>
                <textarea class="p-2 block border w-full h-64 rounded" name="question"
                          placeholder="Ask us anything..."
                          ></textarea>
            </div>
            <button type="submit" class="py-2 px-4 uppercase tracking-wide text-sm font-bold shadow rounded bg-site-primary text-white block mx-auto">Send Question</button>
        </form>
    </section>
@endsection