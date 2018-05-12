@extends('admin.base')

@section('content')
    <section class="flex justify-center items-center h-screen bg-site-other mt-6">
        <form action="/admin/login" method="POST" class="max-w-sm w-full bg-site-other">
            <p class="text-center text-4xl font-bold uppercase my-4 text-site-secondary">Login</p>
            {!! csrf_field() !!}
            <div class="my-3 h-12 w-full flex items-center">
                <label class="text-site-secondary mx-4">
                    @include('svgicons.user', ['classes' => 'h-4'])
                </label>
                <input type="text" name="email" placeholder="Your email address" class="w-full h-8 inline-block border-b border-site-secondary bg-site-other">
            </div>
            <div class="my-3 h-12 w-full flex items-center">
                <label class="text-site-secondary mx-4">
                    @include('svgicons.key', ['classes' => 'h-4'])
                </label>
                <input type="password" name="password" placeholder="Your password" class="w-full h-8 inline-block border-b border-site-secondary bg-site-other">
            </div>
            <div class="my-3 h-12 w-full flex items-center">
                <button type="submit" class="w-full text-white bg-site-secondary uppercase h-12">Login</button>
            </div>
        </form>
    </section>
@endsection