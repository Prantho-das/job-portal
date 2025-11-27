@extends('layouts.frontend')

@section('title', 'All Jobs - BGEA Jobs')

@section('content')

    <div class="bg-[#f0eff5]">
        <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">

                {{-- Sidebar Filters --}}
                <aside class="lg:col-span-1">
                    <div class="sticky top-20">
                        <h2 class="mb-4 text-xl font-bold text-gray-800">Filters</h2>
                        <form action="{{ route('jobs') }}" method="GET" class="space-y-6">
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700">Keyword</label>
                                <input type="text" name="search" id="search" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. Merchandiser" value="{{ request('search') }}">
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select id="category" name="category" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if(request('category') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" name="location" id="location" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. Dhaka" value="{{ request('location') }}">
                            </div>

                            <div>
                                <label for="job_type" class="block text-sm font-medium text-gray-700">Job Type</label>
                                <select id="job_type" name="job_type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option value="">All Types</option>
                                    @foreach($jobTypes as $type)
                                        <option value="{{ $type }}" @if(request('job_type') == $type) selected @endif>{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="education_level" class="block text-sm font-medium text-gray-700">Education Level</label>
                                <select id="education_level" name="education_level" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option value="">All Levels</option>
                                    @foreach($educationLevels as $level)
                                        <option value="{{ $level->id }}" @if(request('education_level') == $level->id) selected @endif>{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="salary_min" class="block text-sm font-medium text-gray-700">Minimum Salary</label>
                                <input type="number" name="salary_min" id="salary_min" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. 30000" value="{{ request('salary_min') }}">
                            </div>

                            <div>
                                <label for="salary_max" class="block text-sm font-medium text-gray-700">Maximum Salary</label>
                                <input type="number" name="salary_max" id="salary_max" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. 60000" value="{{ request('salary_max') }}">
                            </div>

                            <div>
                                <button type="submit" class="inline-flex items-center justify-center w-full px-6 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Apply Filters
                                </button>
                            </div>
                        </form>
                    </div>
                </aside>

                {{-- Job Listings --}}
                <main class="mt-10 lg:col-span-3 lg:mt-0">
                    <h1 class="mb-6 text-3xl font-bold text-gray-800">All Jobs</h1>
                    <div class="space-y-4">
                        @forelse($jobs as $job)
                       <div
                            class="flex items-center justify-between p-4 transition-shadow duration-200 bg-white border border-gray-200 rounded-xl sm:p-6 hover:shadow-md">
                            <div class="flex items-center justify-between">
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900 cursor-pointer hover:text-red-600"><a
                                            href="{{ route('job-detail', $job->slug) }}">{{ $job->title }}</a></h3>
                                    <p class="text-sm text-gray-600">{{ $job->company->name ?? 'N/A' }}</p>
                                    <div class="flex flex-wrap items-center mt-2 text-sm text-gray-500">
                                        <div class="flex items-center my-1 mr-4">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                            <span>{{ $job->experience_min }} - {{ $job->experience_max }} years</span>
                                        </div>
                                        <div class="flex items-center my-1 mr-4">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 11V3m0 8h8m-8 0H3m15.05 6.05a7 7 0 11-9.9-9.9 7 7 0 019.9 9.9z"></path>
                                            </svg>
                                            <span>{{ $job->salary_min }} - {{ $job->salary_max }}</span>
                                        </div>
                                        <div class="flex items-center my-1 mr-4 text-red-600">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span>Deadline: {{ $job->deadline->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center w-full my-1">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>{{ $job->location }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 mr-5">
                                    <img class="object-contain w-20 h-10"
                                        src="{{ $job->company->logo ?? 'https://placehold.co/100x40/e2e8f0/334155?text=Logo' }}"
                                        alt="{{ $job->company->name ?? 'Company' }} logo">
                                </div>
                            </div>
                            <div class="flex-shrink-0 ml-6">
                                <a href="{{ route('job-detail', $job->slug) }}"
                                    class="px-5 py-2.5 rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                    View Job
                                </a>
                            </div>  </div>
                        @empty
                            <p class="text-center text-gray-600">No jobs found matching your criteria.</p>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-10">
                        {{ $jobs->links() }}
                    </div>
                </main>

            </div>
        </div>
    </div>

@endsection
