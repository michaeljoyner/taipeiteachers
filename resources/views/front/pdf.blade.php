@extends('front.base')

@section('content')
    {{--intro--}}
    @include('front.starter-pack.welcome')
    @include('front.starter-pack.introduction')
    @include('front.starter-pack.contents')

    {{--living--}}
    @include('front.starter-pack.why-taipei')
    @include('front.starter-pack.pros-living-taipei')
    @include('front.starter-pack.cons-living-taipei')
    @include('front.starter-pack.choosing-neighborhood')
    @include('front.starter-pack.how-to-find-apartment')
    @include('front.starter-pack.things-to-know-for-apartment')
    @include('front.starter-pack.links-available-apartments')

    {{--teaching--}}
    @include('front.starter-pack.what-teaching-suits-you')
    @include('front.starter-pack.kindergarten')
    @include('front.starter-pack.buxiban')
    @include('front.starter-pack.adult-classes')
    @include('front.starter-pack.private-tutoring')
    @include('front.starter-pack.online-teaching')
    @include('front.starter-pack.business-english')
    @include('front.starter-pack.where-to-look-for-jobs')

    {{--appendix--}}
    @include('front.starter-pack.paperwork')
    @include('front.starter-pack.resources')

@endsection