@extends('front.base', ['pageName' => 'leading-normal'])

@section('content')
    <section class="bg-site-secondary px-4 pt-28 py-40 relative px-4 md:px-0 antialiased">
        <h1 class="text-5xl max-w-xl mx-auto text-white font-cursive">Welcome to Taipei Teachers</h1>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">We help teachers in Taipei find great ESL jobs without charging a dime.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Choose where in Taipei you want to work, set the minimum salary you’d accept, and list the kinds of teaching that suit you. When the right job comes in, you’ll be the first to know. </p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Sign up for free to hear about job opportunities you don't want to miss.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Available soon to teachers in Taipei and New Taipei City.</p>
        <email-signup url="/test-yes" class="shadow absolute pin-b overlap-b px-4">
        
        </email-signup>
        
    </section>
    <section class="pt-40 pb-28 bg-black">
        <h3 class="text-3xl font-cursive mt-8 mb-4 max-w-lg mx-auto text-white">Who are we and what is our goal?</h3>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">We're a group of teachers who have been living and teaching in Taiwan for many a great year. Our goal is to help dedicated, experienced teachers find better jobs while using our experience in Taiwan to arm new teachers with the knowledge they need to find their first teaching job in Taipei.</p>
    </section>
    @include('front.home.new-teachers')
    @include('front.home.old-teachers')
    @include('front.home.schools')
    
@endsection