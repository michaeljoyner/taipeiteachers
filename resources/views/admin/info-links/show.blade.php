@extends('admin.base')

@section('content')
    <info-link :info-link-attributes="{{ json_encode($info_link) }}"></info-link>
@endsection