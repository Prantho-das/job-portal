@extends('layouts.frontend')

@section('title', 'Companies - BGEA Jobs')

@section('content')

    <div class="py-12 bg-white">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-10">Featured Companies</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @for ($i = 0; $i < 12; $i++)
                <div class="bg-white border border-gray-200 rounded-lg text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="p-6">
                        <img class="h-16 w-auto mx-auto mb-4" src="https://placehold.co/150x80/e2e8f0/334155?text=Logo" alt="Company Logo">
                        <h3 class="text-lg font-semibold text-gray-900">Beximco Textiles</h3>
                        <p class="text-sm text-gray-500">Garments & Textiles</p>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-4">
                        <a href="#" class="text-sm font-medium text-red-600 hover:text-red-800">View Jobs</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

@endsection