@extends('front.base')

@section('content')
    <section class="pb-12 pt-20 px-4 md:px-0">
        <h1 class="text-4xl max-w-lg mx-auto text-site-secondary font-cursive">Some Useful Links</h1>
        <section>
            <p class="max-w-lg text-lg text-site-secondary mt-12 mx-auto">
                Still finding your way? We'll be collecting and sharing some useful resources that can make your life easier in Taipei.
            </p>
        </section>
        @foreach($link_groups as $topic => $tips)
        <section class="pt-12">
            <div class="max-w-lg mx-auto">
                <h3 class="mb-4 text-2xl max-w-lg mx-auto text-site-other font-cursive capitalize">{{ $topic }}</h3>
                @foreach($tips as $tip)
                    @include('front.info.info-byte', [
                        'title' => $tip->title,
                        'content' => $tip->content,
                        'link' => $tip->link,
                        'link_text' => $tip->linl_text
                    ])
                @endforeach
            </div>
        </section>
        @endforeach
    </section>
@endsection

