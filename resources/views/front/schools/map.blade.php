@extends('front.base')

@section('content')
    <schools-map :schools-list='{{ json_encode($schools) }}'></schools-map>
@endsection

@section('bodyscripts')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMaps"></script>
@endsection