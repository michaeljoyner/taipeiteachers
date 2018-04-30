@extends('admin.base')

@section('content')
    <faqs-index :faqs='@json($faqs)'></faqs-index>
@endsection