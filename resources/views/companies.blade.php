@extends('layouts.frontend')

@section('title', 'Companies - BGEA Jobs')

@section('content')

    <div class="py-12 bg-[#f0eff5]">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <h1 class="mb-10 text-3xl font-bold text-center text-gray-800">Featured Companies</h1>

            {{-- Filter Form --}}
            <div class="p-6 mb-8 rounded-lg shadow-sm bg-gray-50">
                <form action="{{ route('companies') }}" method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Company Name / Keyword</label>
                        <input type="text" name="search" id="search" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. Tech Solutions" value="{{ request('search') }}">
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" name="location" id="location" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. New York" value="{{ request('location') }}">
                    </div>
                    <div>
                        <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                        <select id="industry" name="industry" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                            <option value="">All Industries</option>
                            @foreach($industries as $industry)
                                <option value="{{ $industry }}" @if(request('industry') == $industry) selected @endif>{{ $industry }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end md:col-span-3">
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @forelse($companies as $company)
                <div class="text-center transition-shadow duration-200 bg-white border border-gray-200 rounded-lg hover:shadow-lg">
                    <div class="p-6">
                        <img class="w-auto h-16 mx-auto mb-4" src="{{ $company->logo ?? 'https://placehold.co/150x80/e2e8f0/334155?text=Logo' }}" alt="{{ $company->name }} Logo">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $company->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $company->industry }}</p>
                        <p class="mt-1 text-xs text-gray-400">{{ $company->city }}, {{ $company->country }}</p>
                        <p class="mt-1 text-xs text-gray-400">{{ $company->jobs_count }} Jobs Available</p>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200">
                        <a href="{{ url('/jobs?company_slug=').$company->slug }}" class="text-sm font-medium text-red-600 hover:text-red-800">View Jobs</a>
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
