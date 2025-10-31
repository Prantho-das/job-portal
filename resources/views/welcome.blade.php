@extends('layouts.frontend')

@section('title', 'BGEA Jobs - Find Your Dream Job Today')

@section('content')

    {{-- Hero Section --}}
    <header class="bg-[#002D3A]">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:flex items-center justify-between">
            <div class="text-white max-w-lg">
                <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">Find Your Dream Job Today</h1>
                <p class="mt-4 text-lg text-gray-300">The largest job portal for garments & textiles sector in Bangladesh.</p>
                <a href="{{ url('/jobs') }}" class="mt-8 inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                    Browse Jobs
                    <svg class="ml-2 -mr-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="mt-10 lg:mt-0 flex-shrink-0">
                <img class="h-80 w-full object-cover rounded-lg shadow-xl lg:h-96 lg:w-[450px]" src="https://images.unsplash.com/photo-1554774853-719586f82d77?q=80&w=2070&auto=format&fit=crop" alt="Professional in a modern textile factory">
            </div>
        </div>
    </header>

    {{-- Job Listings --}}
    <div class="py-12 bg-white">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
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
                                <div class="flex items-center mr-4 my-1">
                                    <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Deadline: 31 Oct 2025</span>
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
        </div>
    </div>

@endsection
