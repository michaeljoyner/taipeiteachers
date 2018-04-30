@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-4 mb-12">
        <h1 class="text-4xl font-sans text-grey-darkest normal">{{ $faq['question'] }}</h1>
        <div class="flex justify-end items-center">
            <a href="/admin/faqs/{{ $faq['id'] }}"
               class=""
            >Back to FAQ</a>
        </div>
    </div>
    <wysiwyg-editor name="full_answer"
                    :init-content='@json($faq['full_answer'])'
                    save-url="/admin/faqs/{{ $faq['id'] }}/full-answer"
                    :save-timer="10"
    ></wysiwyg-editor>
@endsection