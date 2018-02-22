@extends('admin.base')

@section('content')
    <div class="flex justify-between items-center mt-4 mb-12">
        <h1 class="text-4xl font-sans text-grey-darkest normal">Schools for Fools</h1>
        <div class="flex justify-end items-center">
            <add-school></add-school>
        </div>
    </div>
    <section>
        @foreach($schools as $school)
            <div class="flex justify-between bg-grey-lighter my-2 h-32">
                <div class="w-1/5 overflow-hidden">
                    <img src="{{ $school->imageUrl('thumb') ?: '/images/defaults/school.png' }}"
                         alt=""
                         class="w-full">
                </div>
                <div class="flex-auto p-4">
                    <p class="text-lg font-bold mb-3">
                        <a class="no-underline text-grey-darkest" href="/admin/schools/{{ $school->id }}">{{ $school->name }}</a>
                    </p>
                    <p class="mb-8">{{ $school->address }}</p>
                </div>
            </div>
        @endforeach
    </section>
@endsection