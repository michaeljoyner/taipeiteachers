@extends('front.base')

@section('content')
    <section class="py-20">
        <div class="max-w-lg mx-auto">
            <h1 class="mb-12 text-2xl md:text-4xl text-center text-site-secondary font-cursive">{{ $article['title'] }}</h1>
            <img src="{{ $article['title_image_large_tile'] }}"
                 alt="Vaguely relates to {{ $article['title'] }}">
        </div>
        <div class="my-20 max-w-md mx-auto px-4">
            {!! $article['body'] !!}
        </div>
    </section>
@endsection