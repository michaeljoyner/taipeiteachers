@extends('admin.base')

@section('content')
<school-search></school-search>
@endsection

@section('bodyscripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMaps"></script>
@endsection