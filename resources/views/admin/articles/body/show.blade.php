@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-4 mb-12">
        <h1 class="text-4xl font-sans text-grey-darkest normal">{{ $article->title }}</h1>
        <div class="flex justify-end items-center">
            <a href="/admin/articles/{{ $article->id }}"
               class="btn btn-primary">Back to Article</a>
        </div>
    </div>
    <div>
        <wysiwyg-editor name="body_html"
                        :init-content="{{ json_encode($article->body) }}"
                        save-url="/admin/articles/{{ $article->id }}/body"
                        :save-timer="10"
                        image-upload-url="/admin/articles/{{ $article->id }}/images"
        ></wysiwyg-editor>
    </div>
@endsection