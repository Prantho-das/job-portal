@extends('layouts.frontend')

@section('title', 'All Jobs - BGEA Jobs')

@section('content')

    <div class="bg-white">
        <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">

                {{-- Sidebar Filters --}}
                <aside class="lg:col-span-1">
                    <div class="sticky top-20">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Filters</h2>
                        <form action="#" method="GET" class="space-y-6">
                            <div>
                                <label for="keyword" class="block text-sm font-medium text-gray-700">Keyword</label>
                                <input type="text" name="keyword" id="keyword" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="e.g. Merchandiser">
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option>All Categories</option>
                                    <option>IT & Telecommunication</option>
                                    <option>Marketing/Sales</option>
                                    <option>Garments/Textile</option>
                                    <option>Engineering</option>
                                </select>
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <select id="location" name="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option>All Locations</option>
                                    <option>Dhaka</option>
                                    <option>Chittagong</option>
                                    <option>Savar</option>
                                    <option>Gazipur</option>
                                </select>
                            </div>

                            <div>
                                <label for="job_type" class="block text-sm font-medium text-gray-700">Job Type</label>
                                <select id="job_type" name="job_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option>All Types</option>
                                    <option>Full-time</option>
                                    <option>Part-time</option>
                                    <option>Contract</option>
                                    <option>Internship</option>
                                </select>
                            </div>

                            <div>
                                <label for="experience" class="block text-sm font-medium text-gray-700">Experience Level</label>
                                <select id="experience" name="experience" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                    <option>All Levels</option>
                                    <option>Entry Level</option>
                                    <option>Mid Level</option>
                                    <option>Senior Level</option>
                                    <option>Manager</option>
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Apply Filters
                                </button>
                            </div>
                        </form>
                    </div>
                </aside>

                {{-- Job Listings --}}
                <main class="lg:col-span-3 mt-10 lg:mt-0">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">All Jobs</h1>
                    <div class="space-y-px">
                        @for ($i = 0; $i < 8; $i++)
                        <div class="bg-white border border-gray-200 rounded-lg p-4 sm:p-6 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-5">
                                    <img class="h-10 w-20 object-contain" src="https://placehold.co/100x40/e2e8f0/334155?text=Logo" alt="Company logo">
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900 hover:text-red-600 cursor-pointer">Assistant Merchandiser (Jackets/Outerwear)</h3>
                                    <p class="text-sm text-gray-600">Beximco Textiles</p>
                                    <div class="mt-2 flex flex-wrap items-center text-sm text-gray-500">
                                        <div class="flex items-center mr-4 my-1">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                            <span>4 - 5 years</span>
                                        </div>
                                        <div class="flex items-center mr-4 my-1">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V3m0 8h8m-8 0H3m15.05 6.05a7 7 0 11-9.9-9.9 7 7 0 019.9 9.9z"></path></svg>
                                            <span>Not Disclosed</span>
                                        </div>
                                        <div class="flex items-center my-1">
                                            <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            <span>Saver, Bangladesh</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-6 flex-shrink-0">
                                <a href="{{ url('/job-detail') }}" class="px-5 py-2.5 rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                    View Job
                                </a>
                            </div>
                        </div>
                        @endfor
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-10 flex justify-center">
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </a>
                            <a href="#" aria-current="page" class="z-10 bg-red-50 border-red-500 text-red-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">9</a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">10</a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            </a>
                        </nav>
                    </div>
                </main>

            </div>
        </div>
    </div>

@endsection