@extends('admin.base')

@section('content')
    <school-page :school-data="{{ json_encode($school) }}"></school-page>
@endsection