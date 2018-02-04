@extends('front.base', ['pageName' => 'leading-normal'])

@section('content')
    <section class="banner flex justify-center items-center flex-col">
        <div class="flex items-end">
            <svg xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink"
                 version="1.1"
                 viewBox="0 0 100 125"
                 height="120px"
                 fill="#333">
                <polygon points="58.1,36.2 59.9,25.4 57.8,25.4 42,25.4 39.9,25.4 41.8,36.2  "/>
                <polygon points="58.1,48.5 59.9,37.7 59.3,37.7 40.5,37.7 39.9,37.7 41.8,48.5  "/>
                <polygon points="58.1,60.8 59.9,50 59.3,50 40.5,50 39.9,50 41.8,60.8  "/>
                <polygon points="58.1,73.1 59.9,62.2 59.3,62.2 40.5,62.2 39.9,62.2 41.8,73.1  "/>
                <path d="M58,74.5H41.8l-2,15.3H60L58,74.5z M49.9,84.9c-2,0-3.6-1.6-3.6-3.6c0-2,1.6-3.6,3.6-3.6c2,0,3.6,1.6,3.6,3.6   C53.5,83.3,51.9,84.9,49.9,84.9z"/>
                <path d="M56.3,21.5h-4.9l0.7-8.4H51V8.3c0-0.5-0.4-1-1-1s-1,0.4-1,1v4.9h-1.4l0.7,8.4h-4.9v2.4h12.8V21.5z"/>
                <circle fill="#1ABC67"
                        cx="49.9"
                        cy="81.3"
                        r="2.2"/>
                <path d="M30.4,92.7h39.3c0.5,0,1-0.4,1-1s-0.4-1-1-1H30.4c-0.5,0-1,0.4-1,1S29.8,92.7,30.4,92.7z"/>
            </svg>
            <h1 class="text-5xl">
                <span class="text-black">Taipei</span><span class="text-green">Teachers</span><span class="text-black">.</span><span class="text-black">com</span>
            </h1>
        </div>

        <p class="mt-12 text-3xl text-center">Looking for a teaching job in Taipei?<br> You've come to the right place.
        </p>
    </section>
    <section class="flex justify-center">
        <div class="max-w-lg mx-auto pt-12 px-4">
            <h3>Find the best jobs for you</h3>
            <p class="my-12 text-lg">Teaching jobs in Taipei come in all shapes and sizes. From kindergarten to adults,
                                     teaching business English to teaching online classes, it’s certainly not a case of
                                     one size fits all. But finding a size that fits you is what Taipeiteachers.com
                                     wants to do.</p>
            <p class="my-12 text-xl font-bold italic text-grey-darkest border-l-4 border-green pl-4">We want to create a
                                                                                                     way for teachers to
                                                                                                     get notified for
                                                                                                     jobs that
                                                                                                     specifically suit
                                                                                                     their criteria.</p>
            <p class="my-12 text-lg">Looking for a job in the area you live? Or a higher salary? Or only morning hours?
                                     Only interested in part-time jobs? Or teaching adults? Or government schools?
            </p>
            <p class="my-12 text-lg">With Taipeiteachers.com you’ll be the first to know, without having to sift through
                                     the clutter of job boards.</p>
        </div>
    </section>
    <section class="bg-green-lightest">
        <div class="max-w-lg mx-auto pt-12 px-4">
            <h3>Sound good?</h3>
            <p class="my-12 text-lg">Leave us your email and we’ll let you know when we’re up and running. The more
                                     teachers we can get on board the sooner we can turn this into a service Taipei
                                     desperately needs. So do us a solid and share the link with any teachers you know
                                     in Taipei. Thanks a million!</p>
            <form action=""
                  class="mx-auto max-w-sm py-12">
                <div class="flex">
                    <input class="flex-auto border-l border-t border-b border-green h-12"
                           type="email">
                    <button class="w-16 border border-green bg-green text-white font-bold">Join</button>
                </div>
            </form>
        </div>
    </section>
    <section>
        <div class="max-w-lg mx-auto pt-12 px-4">
            <h3>Are you thinking about moving to Taiwan?</h3>
            <p class="my-12 text-lg">We’ve put together a helpful starter pack for anybody moving to Taiwan. It’s jam
                                     packed full of useful info to get you settled into your first job with a roof over
                                     your head. Inside you’ll find some useful Facebook groups to join, important
                                     addresses, a breakdown of the various kinds of teaching jobs with pros and cons for
                                     each, where to look for jobs and tips for landing the job, how to get an apartment
                                     and much, much more! Join Taipeiteachers.com and we’ll send it straight to your
                                     inbox!</p>
        </div>
    </section>
    <footer class="h-64 bg-green flex justify-center items-center">
        <p class="text-5xl text-green-dark font-black">taipeiteachers.com</p>
    </footer>
@endsection