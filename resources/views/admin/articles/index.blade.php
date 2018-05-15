@extends('admin.base')

@section('content')
<articles-index :article-list="{{ json_encode($articles) }}"></articles-index>
@endsection