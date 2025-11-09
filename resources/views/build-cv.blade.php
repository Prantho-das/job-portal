@extends('layouts.frontend')

@section('title', $buildCvTitle)

@section('content')

<div class="py-12 bg-white">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900">{{ $buildCvTitle }}</h1>
            <p class="mt-2 text-sm text-gray-600">{{ $buildCvDescription }}</p>
        </div>

        <form action="{{ route('cv.store') }}" method="POST" class="mt-10 space-y-10">
            @csrf

            {{-- Personal Information --}}
            <div class="p-6 border border-gray-200 rounded-lg bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-800">Personal Information</h2>
                <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn Profile URL</label>
                        <input type="url" name="linkedin" id="linkedin" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Full Address</label>
                        <textarea name="address" id="address" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                    </div>
                </div>
            </div>

            {{-- Work Experience --}}
            <div class="p-6 border border-gray-200 rounded-lg bg-gray-50" x-data="{ experiences: [{ job_title: '', company: '', start_date: '', end_date: '', responsibilities: '' }] }">
                <h2 class="text-xl font-semibold text-gray-800">Work Experience</h2>
                <div class="mt-6 space-y-6">
                    <template x-for="(experience, index) in experiences" :key="index">
                        <div class="relative p-4 border border-gray-300 rounded-md">
                            <button type="button" x-show="experiences.length > 1" @click="experiences.splice(index, 1)" class="absolute text-red-600 top-2 right-2 hover:text-red-800">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label :for="'experience_' + index + '_job_title'" class="block text-sm font-medium text-gray-700">Job Title</label>
                                    <input type="text" :name="'experiences[' + index + '][job_title]'" :id="'experience_' + index + '_job_title'" x-model="experience.job_title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label :for="'experience_' + index + '_company'" class="block text-sm font-medium text-gray-700">Company</label>
                                    <input type="text" :name="'experiences[' + index + '][company]'" :id="'experience_' + index + '_company'" x-model="experience.company" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label :for="'experience_' + index + '_start_date'" class="block text-sm font-medium text-gray-700">Start Date</label>
                                    <input type="month" :name="'experiences[' + index + '][start_date]'" :id="'experience_' + index + '_start_date'" x-model="experience.start_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label :for="'experience_' + index + '_end_date'" class="block text-sm font-medium text-gray-700">End Date</label>
                                    <input type="month" :name="'experiences[' + index + '][end_date]'" :id="'experience_' + index + '_end_date'" x-model="experience.end_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div class="sm:col-span-2">
                                    <label :for="'experience_' + index + '_responsibilities'" class="block text-sm font-medium text-gray-700">Responsibilities</label>
                                    <textarea :name="'experiences[' + index + '][responsibilities]'" :id="'experience_' + index + '_responsibilities'" x-model="experience.responsibilities" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="mt-4 text-right">
                    <button type="button" @click="experiences.push({ job_title: '', company: '', start_date: '', end_date: '', responsibilities: '' })" class="text-sm font-medium text-red-600 hover:text-red-800">+ Add Another Experience</button>
                </div>
            </div>

            {{-- Education --}}
            <div class="p-6 border border-gray-200 rounded-lg bg-gray-50" x-data="{ educations: [{ degree: '', institution: '', graduation_date: '' }] }">
                <h2 class="text-xl font-semibold text-gray-800">Education</h2>
                <div class="mt-6 space-y-6">
                    <template x-for="(education, index) in educations" :key="index">
                        <div class="relative p-4 border border-gray-300 rounded-md">
                            <button type="button" x-show="educations.length > 1" @click="educations.splice(index, 1)" class="absolute text-red-600 top-2 right-2 hover:text-red-800">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label :for="'education_' + index + '_degree'" class="block text-sm font-medium text-gray-700">Degree or Certificate</label>
                                    <input type="text" :name="'educations[' + index + '][degree]'" :id="'education_' + index + '_degree'" x-model="education.degree" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label :for="'education_' + index + '_institution'" class="block text-sm font-medium text-gray-700">Institution</label>
                                    <input type="text" :name="'educations[' + index + '][institution]'" :id="'education_' + index + '_institution'" x-model="education.institution" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div class="sm:col-span-2">
                                    <label :for="'education_' + index + '_graduation_date'" class="block text-sm font-medium text-gray-700">Graduation Date</label>
                                    <input type="month" :name="'educations[' + index + '][graduation_date]'" :id="'education_' + index + '_graduation_date'" x-model="education.graduation_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="mt-4 text-right">
                    <button type="button" @click="educations.push({ degree: '', institution: '', graduation_date: '' })" class="text-sm font-medium text-red-600 hover:text-red-800">+ Add Another Education</button>
                </div>
            </div>

            {{-- Skills --}}
            <div class="p-6 border border-gray-200 rounded-lg bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-800">Skills</h2>
                <div class="mt-6">
                    <label for="skills" class="block text-sm font-medium text-gray-700">List your skills, separated by commas</label>
                    <textarea name="skills" id="skills" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                </div>
            </div>
            
            @if ($buildCvContent)
            <div class="p-6 border border-gray-200 rounded-lg bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-800">Additional Information</h2>
                <div class="mt-6 prose max-w-none">
                    {!! $buildCvContent !!}
                </div>
            </div>
            @endif

            {{-- Action Button --}}
            <div class="text-right">
                <button type="submit" class="inline-flex items-center px-8 py-3 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700">
                    Save & Generate CV
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
