@extends('front.base', ['pageName' => 'leading-normal'])

@section('content')
    <section class="homepage-banner px-4 pt-28 py-40 relative px-4 md:px-0">
        <h1 class="text-center text-huge max-w-lg mx-auto text-grey-darkest font-cursive">Taipei Teachers</h1>
        <p class="text-center text-xl mt-2 mb-12 max-w-lg mx-auto font-bold text-site-other">Find the right ESL job for you.</p>
        <div class="max-w-md mx-auto">
            <div class="flex items-center text-xl mt-4 mb-4 max-w-lg mx-auto text-site-secondary popup">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="36" class="fill-current"><path d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                <span class="pl-4 text-black font-cursive text-grey-darkest">
                Choose where in Taipei you want to work.
            </span>
            </div>
            <div class="flex items-center text-xl mt-4 mb-4 max-w-lg mx-auto text-site-secondary popup del-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="36" class="fill-current"><path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-11v2h1a3 3 0 0 1 0 6h-1v1a1 1 0 0 1-2 0v-1H8a1 1 0 0 1 0-2h3v-2h-1a3 3 0 0 1 0-6h1V6a1 1 0 0 1 2 0v1h3a1 1 0 0 1 0 2h-3zm-2 0h-1a1 1 0 1 0 0 2h1V9zm2 6h1a1 1 0 0 0 0-2h-1v2z"/></svg>
                <span class="pl-4 text-black font-cursive text-grey-darkest">
                Set the minimum salary you’d accept
            </span>
            </div>
            <div class="flex items-center text-xl mt-4 mb-4 max-w-lg mx-auto text-site-secondary popup del-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="36" class="fill-current"><path d="M9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v2zm1-5a1 1 0 0 1 0-2 5 5 0 0 1 5 5v2a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3zm-2-4a1 1 0 0 1 0-2 3 3 0 0 0 0-6 1 1 0 0 1 0-2 5 5 0 0 1 0 10z"/></svg>
                <span class="pl-4 text-black font-cursive text-grey-darkest">
                Select the kinds of classes that suit you.
            </span>
            </div>
            <div class="flex items-center text-xl mt-4 mb-4 max-w-lg mx-auto text-site-secondary popup del-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current" height="36"><path d="M16.21 16.95a5 5 0 0 1-4.02 4.9l-3.85.77a1 1 0 0 1-.9-.27l-.71-.7a2 2 0 0 1 0-2.83l1.44-1.45a13.17 13.17 0 0 1-1.42-1.41L5.31 17.4a2 2 0 0 1-2.83 0l-.7-.7a1 1 0 0 1-.28-.9l.77-3.86a5 5 0 0 1 4.9-4.02h.86a13.07 13.07 0 0 1 12.82-5.47 1 1 0 0 1 .83.83A12.98 12.98 0 0 1 16.2 16.1v.85zm-4.41 2.94a3 3 0 0 0 2.41-2.94v-1.4a1 1 0 0 1 .47-.84A11.04 11.04 0 0 0 19.8 4.33 10.98 10.98 0 0 0 9.42 9.45a1 1 0 0 1-.85.47h-1.4a3 3 0 0 0-2.94 2.4l-.66 3.34.33.33 2.24-2.24a1 1 0 0 1 1.52.12 11.08 11.08 0 0 0 2.6 2.6 1 1 0 0 1 .12 1.52l-2.24 2.24.33.33 3.33-.67zM15 10a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>
                <span class="pl-4 text-black font-cursive text-grey-darkest">
                When the right job comes in, you’ll be the first to know.
            </span>
            </div>
        </div>



        <email-signup url="/test-yes" class="shadow absolute pin-b overlap-b px-4">
        
        </email-signup>
        
    </section>
    <section class="pt-40 pb-28">
        <h3 class="text-4xl font-cursive mt-8 mb-4 max-w-lg mx-auto text-site-secondary">Who are we?</h3>
        <p class="text-xl mt-8 mb-4 max-w-lg mx-auto text-black">We're a group of teachers who have been living and teaching in Taiwan for many a great year. Our goal is to help dedicated, experienced teachers find better jobs while using our experience in Taiwan to arm new teachers with the knowledge they need to find their first teaching job in Taipei.</p>
    </section>
    @include('front.home.new-teachers')
    @include('front.home.old-teachers')
    @include('front.home.schools')
@endsection