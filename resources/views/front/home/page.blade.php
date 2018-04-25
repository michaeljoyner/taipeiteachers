@extends('front.base', ['pageName' => 'leading-normal'])

@section('content')
    <section class="bg-site-secondary px-4 pt-28 py-40 relative px-4 md:px-0">
        <h1 class="text-5xl max-w-xl mx-auto text-white font-cursive">Start a better job next semester.</h1>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Dont wait until you're having a bad day to check the job boards. In fact, don't check the job borads at all.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Get onto the Taipei Teacher's mailing list for free and the jobs will find you instead.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Yoou choose where you ant to work, set a minimum salary you'd accept, and list which kind of teaching suits you. When opportuninty knocks you'll be the first to know.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Available soon to teachers in Taipei and New Taipei City.</p>
        <email-signup url="/test-yes" class="shadow absolute pin-b overlap-b px-4">
        
        </email-signup>
        
    </section>
    @include('front.home.new-teachers')
    @include('front.home.old-teachers')
    @include('front.home.schools')
    
@endsection