@extends('front.base', ['pageName' => 'leading-normal'])

@section('content')
    <section class="bg-site-secondary px-4 pt-28 py-40 relative">
        <h1 class="text-5xl max-w-xl mx-auto text-white font-cursive">Start a better job next semester.</h1>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Dont wait until you're having a bad day to check the job boards. In fact, don't check the job borads at all.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Get onto the Taipei Teacher's mailing list for free and the jobs will find you instead.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Yoou choose where you ant to work, set a minimum salary you'd accept, and list which kind of teaching suits you. When opportuninty knocks you'll be the first to know.</p>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-white">Available soon to teachers in Taipei and New Taipei City.</p>
        <form action=""
              class="px-12 py-8 shadow max-w-md w-full mx-auto rounded bg-white absolute pin-b overlap-b">
            <p class="text-primary text-xl mb-12">Sign up to be informed when we launch</p>
            <div class="rounded-full flex items-center">
                <input type="text"
                       class="pl-2 flex-1 h-12 rounded-bl-full rounded-tl-full border-t border-b border-l border-site-primary">
                <button type="submit"
                        class="h-12 bg-site-primary border-t border-b border-r rounded-tr-full rounded-br-full border-site-primary text-white px-4">
                    Sign me up!
                </button>
            </div>
            <p class="mt-4 text-sm text-grey-dark text-center">No spam, we promise!</p>
        </form>
    </section>
    @include('front.home.new-teachers')
    @include('front.home.old-teachers')
    @include('front.home.schools')
    
@endsection