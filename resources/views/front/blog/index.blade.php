@extends('front.base')

@section('content')
    <section class="pt-20 px-4">
        <div class="max-w-lg mx-auto">
            <h1 class="text-2xl text-4xl text-site-secondary font-cursive">Taipei Teachers' Blog</h1>
            <p class="text-lg text-site-secondary mt-12 mx-auto">
                Articles for those looking to know the ins and out of living and teaching in Taipei City, and even in
                Taiwan in general.
            </p>
        </div>
    </section>
    <section>
        <div class="max-w-lg mx-auto">
            @foreach($articles as $article)
                @include('front.blog.preview')
            @endforeach
        </div>

    </section>
@endsection