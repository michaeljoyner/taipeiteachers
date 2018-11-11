<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title', 'Taipei Teachers')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/fapp.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:700|Rubik:400,500" rel="stylesheet">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
</head>
<body  class="{{ $pageName ?? '' }} font-sans text-site-secondary leading-normal flex flex-col min-h-100 pt-12">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<div id="app" class="flex-auto">
    @include('front.partials.navbar')
    @yield('content')

</div>
@include('front.partials.footer')

<script src="{{ mix('js/fapp.js') }}"></script>
@yield('bodyscripts')
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','{{ config('services.google.analytics_id') }}','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>