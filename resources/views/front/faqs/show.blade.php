@extends('front.base')

@section('content')
    <section>
        <h1>{{ $faq['question'] }}</h1>
        <p>{{ $faq['short_answer'] }}</p>
        <div>{!! $faq['full_answer'] !!}</div>
    </section>
@endsection