<article class="my-12 px-4">
    <h3 class="font-cursive text-xl">
        <a href="/blog/{{ $article->slug }}" class="text-site-secondary no-underline border-b-2 border-site-primary">{{ $article->title }}</a>
    </h3>
    <p class="mt-4 max-w-md">{{ $article->intro }}</p>
    {{--<div class="flex justify-center py-8">--}}
        <a href="/blog/{{ $article->slug }}"
           class="mt-4 inline-block rounded no-underline bg-site-primary text-xs shadow text-white py-1 px-2">Read Article</a>
    {{--</div>--}}
</article>