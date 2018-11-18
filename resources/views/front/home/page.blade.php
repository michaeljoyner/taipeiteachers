@extends('front.base', ['pageName' => 'leading-normal'])

@section('content')
    <section class="homepage-banner px-4 py-12 md:py-28 relative px-4 md:px-0">
        <div class="max-w-md mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-huge max-w-lg mx-auto text-grey-darkest font-cursive">Taipei Teachers</h1>
            <div class="h-2 w-64 bg-site-primary rounded growout"></div>
            <p class="text-xl mt-2 mb-12 max-w-lg mx-auto font-bold text-grey">Find the right ESL job for you.</p>
        </div>

        @include('front.home.pitch')
        <email-signup url="/test-yes" class="px-4"></email-signup>
    </section>
    <section class="pb-28 px-4">
        <h3 class="text-2xl md:text-4xl font-cursive mt-8 mb-4 max-w-lg mx-auto text-site-secondary">Who are we?</h3>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-black">We're a group of teachers who have been living and teaching in Taiwan for many a great year. Our goal is to help dedicated, experienced teachers find better jobs while using our experience in Taiwan to arm new teachers with the knowledge they need to find their first teaching job in Taipei.</p>
    </section>
    @include('front.home.new-teachers')
    @include('front.home.old-teachers')
    @include('front.home.schools')
@endsection