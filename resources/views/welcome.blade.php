@extends('layouts.frontend')

@section('title', $heroTitle)

@section('content')

    {{-- Hero Section --}}
    <header class="bg-[#002D3A]">
        <div class="items-center justify-between max-w-screen-xl px-4 py-20 mx-auto sm:px-6 lg:px-8 lg:flex">
            <div class="max-w-lg text-white">
                <h1 class="text-4xl font-extrabold leading-tight lg:text-5xl">{{ $heroTitle }}</h1>
                <p class="mt-4 text-lg text-gray-300">{{ $heroDescription }}</p>
                <a href="{{ $heroButtonUrl }}" class="inline-flex items-center justify-center px-6 py-3 mt-8 text-base font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700">
                    {{ $heroButtonText }}
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="flex-shrink-0 mt-10 lg:mt-0">
                <img class="h-80 w-full object-cover rounded-lg shadow-xl lg:h-96 lg:w-[450px]" src="{{ asset($heroImage) }}" alt="{{ $heroTitle }}">
            </div>
        </div>
    </header>

    {{-- Job Listings --}}
    <div class="py-12 bg-white">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-px">
                @foreach($latestJobs as $job)
                <div class="flex items-center justify-between p-4 transition-shadow duration-200 bg-white border border-gray-200 rounded-lg sm:p-6 hover:shadow-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-5">
                            <img class="object-contain w-20 h-10" src="{{ $job->company->logo ?? 'https://placehold.co/100x40/e2e8f0/334155?text=Logo' }}" alt="{{ $job->company->name ?? 'Company' }} logo">
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold text-gray-900 cursor-pointer hover:text-red-600"><a href="{{ route('job-detail', $job->slug) }}">{{ $job->title }}</a></h3>
                            <p class="text-sm text-gray-600">{{ $job->company->name ?? 'N/A' }}</p>
                            <div class="flex flex-wrap items-center mt-2 text-sm text-gray-500">
                                <div class="flex items-center my-1 mr-4">
                                    <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    <span>{{ $job->experience_min }} - {{ $job->experience_max }} years</span>
                                </div>
                                <div class="flex items-center my-1 mr-4">
                                    <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V3m0 8h8m-8 0H3m15.05 6.05a7 7 0 11-9.9-9.9 7 7 0 019.9 9.9z"></path></svg>
                                    <span>{{ $job->salary_min }} - {{ $job->salary_max }}</span>
                                </div>
                                <div class="flex items-center my-1 mr-4">
                                    <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Deadline: {{ $job->deadline->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center my-1">
                                    <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span>{{ $job->location }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ml-6">
                        <a href="{{ route('job-detail', $job->slug) }}" class="px-5 py-2.5 rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                            View Job
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center mt-10">
                {{ $latestJobs->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

@endsection
