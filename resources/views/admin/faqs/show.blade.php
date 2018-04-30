@extends('admin.base')

@section('content')
    <faq-page :faq-attributes='@json($faq)'></faq-page>
@endsection