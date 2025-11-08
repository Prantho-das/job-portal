@extends('layouts.frontend')

@section('title', 'Companies - BGEA Jobs')

@section('content')

    <div class="py-12 bg-white">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-10">Featured Companies</h1>

            {{-- Filter Form --}}
            <div class="mb-8 bg-gray-50 p-6 rounded-lg shadow-sm">
                <form action="{{ route('companies') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Company Name / Keyword</label>
                        <input type="text" name="search" id="search" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. Tech Solutions" value="{{ request('search') }}">
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" name="location" id="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. New York" value="{{ request('location') }}">
                    </div>
                    <div>
                        <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                        <select id="industry" name="industry" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                            <option value="">All Industries</option>
                            @foreach($industries as $industry)
                                <option value="{{ $industry }}" @if(request('industry') == $industry) selected @endif>{{ $industry }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-3 flex justify-end">
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($companies as $company)
                <div class="bg-white border border-gray-200 rounded-lg text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="p-6">
                        <img class="h-16 w-auto mx-auto mb-4" src="{{ $company->logo ?? 'https://placehold.co/150x80/e2e8f0/334155?text=Logo' }}" alt="{{ $company->name }} Logo">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $company->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $company->industry }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $company->city }}, {{ $company->country }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $company->jobs_count }} Jobs Available</p>
                    </div>
                    <div class="border-t border-gray-200 px-6 py-4">
                        <a href="#" class="text-sm font-medium text-red-600 hover:text-red-800">View Jobs</a>
                    </div>
                </div>
                @empty
                    <p class="text-center text-gray-600 col-span-full">No companies found matching your criteria.</p>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-10">
                {{ $companies->links() }}
            </div>
        </div>
    </div>

@endsection
