@extends('front.base')

@section('content')
    <section class="pb-12 pt-20 px-4 md:px-0">
        <h1 class="text-4xl max-w-lg mx-auto text-site-secondary font-cursive">Some Useful Links</h1>
        <section>
            <p class="max-w-lg text-lg text-site-secondary mt-12 mx-auto">
                Still finding your way? We'll be collecting and sharing some useful resources that can make your life easier in Taipei.
            </p>
        </section>
        <section class="pt-12 pb-20">
            <div class="max-w-lg mx-auto">
                <h3 class="mb-4 text-2xl max-w-lg mx-auto text-site-other font-cursive">Teaching</h3>

                @foreach(range(1,3) as $item)
                    @include('front.info.info-byte')
                @endforeach
            </div>
        </section>
        <section class="py-28 bg-site-other">
            <div class="max-w-lg mx-auto">
                <h3 class="mb-20 text-2xl text-white max-w-lg mx-auto text-site-secondary font-cursive">Recreation</h3>

                @foreach(range(1,3) as $item)
                    @include('front.info.info-byte', ['dark' => true])
                @endforeach
            </div>
        </section>
    </section>
@endsection

