@extends('layouts.frontend')

@section('title', $job->title . ' - BGEA Jobs')

@section('content')

<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-[#f0eff5] border border-gray-200 rounded-lg md:p-8">

            {{-- Header --}}
            <div class="items-start justify-between mb-6 md:flex">
                <div class="flex-grow">
                    <a href="{{ route('jobs') }}" class="flex items-center mb-4 text-sm font-medium text-gray-600 no-print hover:text-gray-900">
                        <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Job List
                    </a>
                    <div class="flex items-center">
                        <img class="object-contain w-auto h-12 mr-4" src="{{ $job->company->logo ?? 'https://placehold.co/100x50/e2e8f0/334155?text=Logo' }}" alt="{{ $job->company->name ?? 'Company' }} logo">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $job->title }}</h1>
                            <p class="text-base text-gray-600">{{ $job->company->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 mt-4 text-left md:text-right md:mt-0 md:ml-6">
                    <p class="flex items-center text-sm text-gray-500 md:justify-end">
                        <svg class="h-4 w-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        Deadline: {{ $job->deadline->format('d M Y') }}
                    </p>
                    <div class="flex items-center mt-3 gap-x-2">
                        <button id="apply-now-btn" type="button" class="no-print flex-grow text-center px-5 py-2.5 rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 transition-colors">
                            Apply Now
                        </button>
                        
                        <button onclick="window.print()" class="p-2.5 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M5 4h10a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2zm0 1a1 1 0 00-1 1v6a1 1 0 001 1h10a1 1 0 001-1V6a1 1 0 00-1-1H5z"></path><path d="M6 12a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zM4 8a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zM3 15a1 1 0 100 2h14a1 1 0 100-2H3z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Tabs --}}
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px space-x-6" aria-label="Tabs">
                    <a href="#description" class="px-4 py-3 text-sm font-semibold text-gray-800 border-b-2 border-yellow-400 bg-yellow-50 whitespace-nowrap rounded-t-md">Description</a>
                    <a href="#requirements" class="px-4 py-3 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">Requirements</a>
                    <a href="#responsibilities" class="px-4 py-3 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">Responsibilities</a>
                    <a href="#benefits" class="px-4 py-3 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">Benefits</a>
                    <a href="#company-info" class="px-4 py-3 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">Company Information</a>
                </nav>
            </div>

            {{-- Job Details --}}
            <div class="mt-8">
                {{-- Summary --}}
                <div class="p-6 rounded-lg bg-sky-50">
                    <h3 class="mb-4 text-lg font-bold text-gray-900">Summary</h3>
                    <div class="grid grid-cols-1 text-sm sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-4">
                        <div><span class="font-semibold text-gray-600">Job Type:</span> <span class="text-gray-800">{{ ucfirst($job->job_type) }}</span></div>
                        <div><span class="font-semibold text-gray-600">Employment Status:</span> <span class="text-gray-800">{{ ucfirst($job->employment_status) }}</span></div>
                        <div><span class="font-semibold text-gray-600">Location:</span> <span class="text-gray-800">{{ $job->location }}</span></div>
                        <div><span class="font-semibold text-gray-600">Experience:</span> <span class="text-gray-800">{{ $job->experience_min }} to {{ $job->experience_max }} years</span></div>
                        <div><span class="font-semibold text-gray-600">Age:</span> <span class="text-gray-800">{{ $job->age_min }} to {{ $job->age_max }}</span></div>
                        <div><span class="font-semibold text-gray-600">Gender:</span> <span class="text-gray-800">{{ ucfirst(str_replace('_', ' ', $job->gender_preference)) }}</span></div>
                        <div><span class="font-semibold text-gray-600">Salary:</span> <span class="text-gray-800">{{ $job->salary_min }} - {{ $job->salary_max }}</span></div>
                        <div><span class="font-semibold text-gray-600">Education:</span> <span class="text-gray-800">
                            @forelse($job->educationLevels as $educationLevel)
                                {{ $educationLevel->name }}{{ !$loop->last ? ', ' : '' }}
                            @empty
                                N/A
                            @endforelse
                        </span></div>
                        <div><span class="font-semibold text-gray-600">Job Nature:</span> <span class="text-gray-800">{{ ucfirst($job->job_nature) }}</span></div>
                    </div>
                </div>

                <div class="mt-8 space-y-8 text-sm text-gray-700">
                    <div id="description">
                        <h3 class="text-lg font-bold text-gray-900">Description</h3>
                        <div class="mt-4 prose max-w-none">
                            {!! $job->description !!}
                        </div>
                    </div>

                    <div id="requirements">
                        <h3 class="text-lg font-bold text-gray-900">Requirements</h3>
                        <div class="mt-4 prose max-w-none">
                            {!! $job->requirements !!}
                        </div>
                    </div>

                    <div id="responsibilities">
                        <h3 class="text-lg font-bold text-gray-900">Responsibilities & Context</h3>
                        <div class="mt-4 prose max-w-none">
                            {!! $job->responsibilities !!}
                        </div>
                    </div>

                    <div id="benefits">
                        <h3 class="text-lg font-bold text-gray-900">Benefits</h3>
                        <div class="mt-4 prose max-w-none">
                            {!! $job->benefits !!}
                        </div>
                    </div>

                    <div id="skills-expertise">
                        <h3 class="text-lg font-bold text-gray-900">Skills & Expertise</h3>
                        <div class="flex flex-wrap gap-2 mt-4">
                            @forelse($job->categories as $category)
                                <span class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-200 rounded-full">{{ $category->name }}</span>
                            @empty
                                <span class="text-gray-500">N/A</span>
                            @endforelse
                            @if($job->keywords)
                                @foreach($job->keywords as $keyword)
                                    <span class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-200 rounded-full">{{ $keyword }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div id="company-info">
                        <h3 class="text-lg font-bold text-gray-900">Company Information</h3>
                        <div class="mt-4 space-y-3">
                            <p class="font-semibold">{{ $job->company->name ?? 'N/A' }}</p>
                            <p><span class="font-semibold">Address:</span> {{ $job->company->address ?? 'N/A' }}</p>
                            <p><span class="font-semibold">Business:</span> {{ $job->company->description ?? 'N/A' }}</p>
                            <p><span class="font-semibold">Website:</span> <a href="{{ $job->company->website ?? '#' }}" target="_blank" class="text-red-600 hover:underline">{{ $job->company->website ?? 'N/A' }}</a></p>
                            <p><span class="font-semibold">Phone:</span> {{ $job->company->phone ?? 'N/A' }}</p>
                            <p><span class="font-semibold">Email:</span> {{ $job->company->email ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div id="apply-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black bg-opacity-60">
    <div class="relative w-full max-w-lg p-8 bg-white rounded-lg shadow-xl">
        <button id="close-modal-btn" class="absolute text-gray-400 top-4 right-4 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <h2 class="text-xl font-bold text-gray-900">Upload CV</h2>
        <p class="mt-2 text-sm text-gray-600">Please fill out the form below, upload your CV or résumé, and click the submit button.</p>

        <form action="{{ route('applications.store', $job->slug) }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-5">
            @csrf
            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}">

            @guest
                <div>
                    <label for="full_name" class="sr-only">Full Name</label>
                    <input type="text" id="full_name" name="full_name" placeholder="Full Name*" class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:bg-white focus:ring-2 focus:ring-red-500" required>
                </div>
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email*" class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:bg-white focus:ring-2 focus:ring-red-500" required>
                </div>
                <div>
                    <label for="mobile" class="sr-only">Mobile</label>
                    <input type="text" id="mobile" name="mobile" placeholder="Mobile" class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:bg-white focus:ring-2 focus:ring-red-500">
                </div>
            @else
                <div>
                    <label for="full_name" class="sr-only">Full Name</label>
                    <input type="text" id="full_name" name="full_name" value="{{ Auth::user()->name }}" class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md" readonly>
                </div>
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md" readonly>
                </div>
                <div>
                    <label for="mobile" class="sr-only">Mobile</label>
                    <input type="text" id="mobile" name="mobile" placeholder="Mobile" class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:bg-white focus:ring-2 focus:ring-red-500" value="{{ Auth::user()->mobile ?? '' }}">
                </div>
            @endguest
            <div>
                <div class="flex justify-center px-6 pt-8 pb-8 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="cv_file" class="relative font-medium text-red-600 bg-white rounded-md cursor-pointer hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                <span>Click or drag the file here to upload</span>
                                <input id="cv_file" name="cv_file" type="file" class="sr-only" required>
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">Only support PDF & WORD format. Max file size: 2MB</p>
                    </div>
                </div>
                <div id="file-upload-name" class="flex items-center justify-between hidden p-3 mt-2 border border-gray-200 rounded-md bg-gray-50">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M3.75 2.116A2.116 2.116 0 002.116 3.75v12.5c0 1.17.946 2.116 2.116 2.116h12.5a2.116 2.116 0 002.116-2.116V7.884a2.116 2.116 0 00-.62-1.496L13.62 1.504A2.116 2.116 0 0012.125 1H5.884A2.116 2.116 0 003.75 2.116zM8.5 7.25a.75.75 0 00-1.5 0v5.5a.75.75 0 001.5 0v-5.5zM10.75 5a.75.75 0 01.75.75v8.5a.75.75 0 01-1.5 0v-8.5a.75.75 0 01.75-.75zm2.25 2.5a.75.75 0 00-1.5 0v5.5a.75.75 0 001.5 0v-5.5z"></path></svg>
                        <span class="ml-2 text-sm text-gray-800" id="uploaded-file-name"></span>
                    </div>
                    <button type="button" id="remove-file-btn" class="ml-3 text-gray-500 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
            <div class="flex items-center mt-6">
                <input id="agree" name="agree" type="checkbox" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500" required>
                <label for="agree" class="block ml-3 text-sm text-gray-900">I agree to have my CV stored.</label>
            </div>
            <div class="flex justify-end pt-6 space-x-4">
                <button type="button" id="cancel-btn" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</button>
                <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const applyModal = document.getElementById('apply-modal');
        const applyNowBtn = document.getElementById('apply-now-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');
        const cancelBtn = document.getElementById('cancel-btn');

        const openModal = () => applyModal.classList.remove('hidden');
        const closeModal = () => applyModal.classList.add('hidden');

        if (applyNowBtn) {
            applyNowBtn.addEventListener('click', openModal);
        }
        if(closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }
        if(cancelBtn) {
            cancelBtn.addEventListener('click', closeModal);
        }

        if(applyModal) {
            applyModal.addEventListener('click', (event) => {
                if (event.target === applyModal) {
                    closeModal();
                }
            });
        }
    });
</script>

@endsection