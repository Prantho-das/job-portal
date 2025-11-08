@extends('layouts.frontend') {{-- Assuming you have a frontend layout --}}

@section('title', $page->title)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $page->title }}</h1>
        <div class="prose lg:prose-xl max-w-none">
            {!! $page->content !!}
        </div>
    </div>
@endsection
