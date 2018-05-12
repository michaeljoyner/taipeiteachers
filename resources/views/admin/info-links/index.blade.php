@extends('admin.base')

@section('content')
<info-links-index :info-links="{{ json_encode($info_links) }}"></info-links-index>
@endsection