@extends('layouts.frontend')

@section('title', 'Build Your CV - BGEA Jobs')

@section('content')

<div class="bg-white py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900">Build Your Professional CV</h1>
            <p class="mt-2 text-sm text-gray-600">Fill out the sections below to create a comprehensive CV that you can use to apply for jobs.</p>
        </div>

        <form action="#" method="POST" class="mt-10 space-y-10">
            {{-- Personal Information --}}
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800">Personal Information</h2>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn Profile URL</label>
                        <input type="url" name="linkedin" id="linkedin" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Full Address</label>
                        <textarea name="address" id="address" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                    </div>
                </div>
            </div>

            {{-- Work Experience --}}
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800">Work Experience</h2>
                <div class="mt-6 space-y-6">
                    <div class="border border-gray-300 rounded-md p-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                                <input type="text" name="job_title" id="job_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <input type="text" name="company" id="company" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="month" name="start_date" id="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="month" name="end_date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="responsibilities" class="block text-sm font-medium text-gray-700">Responsibilities</label>
                                <textarea name="responsibilities" id="responsibilities" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <button type="button" class="text-sm font-medium text-red-600 hover:text-red-800">+ Add Another Experience</button>
                </div>
            </div>

            {{-- Education --}}
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800">Education</h2>
                <div class="mt-6 space-y-6">
                    <div class="border border-gray-300 rounded-md p-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="degree" class="block text-sm font-medium text-gray-700">Degree or Certificate</label>
                                <input type="text" name="degree" id="degree" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                                <input type="text" name="institution" id="institution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="graduation_date" class="block text-sm font-medium text-gray-700">Graduation Date</label>
                                <input type="month" name="graduation_date" id="graduation_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <button type="button" class="text-sm font-medium text-red-600 hover:text-red-800">+ Add Another Education</button>
                </div>
            </div>

            {{-- Skills --}}
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800">Skills</h2>
                <div class="mt-6">
                    <label for="skills" class="block text-sm font-medium text-gray-700">List your skills, separated by commas</label>
                    <textarea name="skills" id="skills" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                </div>
            </div>

            {{-- Action Button --}}
            <div class="text-right">
                <button type="submit" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700">
                    Save & Generate CV
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
