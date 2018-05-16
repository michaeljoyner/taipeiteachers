@extends('front.base')

@section('content')
    <section class="py-20">
        <div class="max-w-lg mx-auto">
            <h1 class="mb-12 text-4xl text-site-secondary font-cursive">{{ $article['title'] }}</h1>
            <img src="{{ $article['title_image_large_tile'] }}"
                 alt="Vaguely relates to {{ $article['title'] }}">
        </div>
        <div class="my-20 max-w-md mx-auto">
            {!! $article['body'] !!}
        </div>
    </section>

@endsection