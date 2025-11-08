<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-3xl mx-auto">
                    {{-- Back button at the top --}}
                    <div class="mb-6">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Back to Dashboard') }}
                        </a>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Profile Information') }}
                    </h3>
                    <p class="mt-1 text-base text-gray-600 dark:text-gray-400 mb-6">
                        {{ __("Update your account's profile information and email address. Also, provide additional details for your job seeker profile.") }}
                    </p>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-8">
                        @csrf
                        @method('patch')

                        {{-- User Account Information --}}
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Account Details') }}</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-800 dark:text-gray-200">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Personal Information --}}
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Personal Information') }}</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="first_name" :value="__('First Name')" />
                                    <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $profile->first_name ?? '')" autocomplete="first_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                                </div>
                                <div>
                                    <x-input-label for="last_name" :value="__('Last Name')" />
                                    <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $profile->last_name ?? '')" autocomplete="last_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                                </div>
                                <div>
                                    <x-input-label for="father_name" :value="__('Father\'s Name')" />
                                    <x-text-input id="father_name" name="father_name" type="text" class="mt-1 block w-full" :value="old('father_name', $profile->father_name ?? '')" autocomplete="father_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
                                </div>
                                <div>
                                    <x-input-label for="mother_name" :value="__('Mother\'s Name')" />
                                    <x-text-input id="mother_name" name="mother_name" type="text" class="mt-1 block w-full" :value="old('mother_name', $profile->mother_name ?? '')" autocomplete="mother_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('mother_name')" />
                                </div>
                                <div>
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $profile->gender ?? '')" autocomplete="gender" />
                                    <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                                </div>
                                <div>
                                    <x-input-label for="religion" :value="__('Religion')" />
                                    <x-text-input id="religion" name="religion" type="text" class="mt-1 block w-full" :value="old('religion', $profile->religion ?? '')" autocomplete="religion" />
                                    <x-input-error class="mt-2" :messages="$errors->get('religion')" />
                                </div>
                                <div>
                                    <x-input-label for="dob" :value="__('Date of Birth')" />
                                    <x-text-input id="dob" name="dob" type="date" class="mt-1 block w-full" :value="old('dob', $profile->dob ?? '')" autocomplete="dob" />
                                    <x-input-error class="mt-2" :messages="$errors->get('dob')" />
                                </div>
                                <div>
                                    <x-input-label for="nid" :value="__('NID')" />
                                    <x-text-input id="nid" name="nid" type="text" class="mt-1 block w-full" :value="old('nid', $profile->nid ?? '')" autocomplete="nid" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nid')" />
                                </div>
                            </div>
                        </div>

                        {{-- Contact Information --}}
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Contact Information') }}</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="phone" :value="__('Phone')" />
                                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $profile->phone ?? '')" autocomplete="phone" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                                <div>
                                    <x-input-label for="secondary_phone" :value="__('Secondary Phone')" />
                                    <x-text-input id="secondary_phone" name="secondary_phone" type="text" class="mt-1 block w-full" :value="old('secondary_phone', $profile->secondary_phone ?? '')" autocomplete="secondary_phone" />
                                    <x-input-error class="mt-2" :messages="$errors->get('secondary_phone')" />
                                </div>
                                <div>
                                    <x-input-label for="secondary_email" :value="__('Secondary Email')" />
                                    <x-text-input id="secondary_email" name="secondary_email" type="email" class="mt-1 block w-full" :value="old('secondary_email', $profile->secondary_email ?? '')" autocomplete="secondary_email" />
                                    <x-input-error class="mt-2" :messages="$errors->get('secondary_email')" />
                                </div>
                            </div>
                        </div>

                        {{-- Address Information --}}
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Address Information') }}</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="present_address" :value="__('Present Address')" />
                                    <textarea id="present_address" name="present_address" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" rows="3" autocomplete="present_address">{{ old('present_address', $profile->present_address ?? '') }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('present_address')" />
                                </div>
                                <div>
                                    <x-input-label for="permanent_address" :value="__('Permanent Address')" />
                                    <textarea id="permanent_address" name="permanent_address" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" rows="3" autocomplete="permanent_address">{{ old('permanent_address', $profile->permanent_address ?? '') }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('permanent_address')" />
                                </div>
                            </div>
                        </div>

                        {{-- Career Information --}}
                        <div>
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Career Information') }}</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="objective" :value="__('Objective')" />
                                    <textarea id="objective" name="objective" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" rows="3" autocomplete="objective">{{ old('objective', $profile->objective ?? '') }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('objective')" />
                                </div>
                                <div>
                                    <x-input-label for="present_salary" :value="__('Present Salary')" />
                                    <x-text-input id="present_salary" name="present_salary" type="number" class="mt-1 block w-full" :value="old('present_salary', $profile->present_salary ?? '')" autocomplete="present_salary" />
                                    <x-input-error class="mt-2" :messages="$errors->get('present_salary')" />
                                </div>
                                <div>
                                    <x-input-label for="expected_salary" :value="__('Expected Salary')" />
                                    <x-text-input id="expected_salary" name="expected_salary" type="number" class="mt-1 block w-full" :value="old('expected_salary', $profile->expected_salary ?? '')" autocomplete="expected_salary" />
                                    <x-input-error class="mt-2" :messages="$errors->get('expected_salary')" />
                                </div>
                                <div>
                                    <x-input-label for="job_level" :value="__('Job Level')" />
                                    <x-text-input id="job_level" name="job_level" type="text" class="mt-1 block w-full" :value="old('job_level', $profile->job_level ?? '')" autocomplete="job_level" />
                                    <x-input-error class="mt-2" :messages="$errors->get('job_level')" />
                                </div>
                                <div>
                                    <x-input-label for="job_nature" :value="__('Job Nature')" />
                                    <x-text-input id="job_nature" name="job_nature" type="text" class="mt-1 block w-full" :value="old('job_nature', $profile->job_nature ?? '')" autocomplete="job_nature" />
                                    <x-input-error class="mt-2" :messages="$errors->get('job_nature')" />
                                </div>
                                <div>
                                    <x-input-label for="career_summary" :value="__('Career Summary')" />
                                    <textarea id="career_summary" name="career_summary" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" rows="3" autocomplete="career_summary">{{ old('career_summary', $profile->career_summary ?? '') }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('career_summary')" />
                                </div>
                                <div>
                                    <x-input-label for="special_qualification" :value="__('Special Qualification')" />
                                    <textarea id="special_qualification" name="special_qualification" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" rows="3" autocomplete="special_qualification">{{ old('special_qualification', $profile->special_qualification ?? '') }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('special_qualification')" />
                                </div>
                                <div>
                                    <x-input-label for="keyword" :value="__('Keyword')" />
                                    <x-text-input id="keyword" name="keyword" type="text" class="mt-1 block w-full" :value="old('keyword', $profile->keyword ?? '')" autocomplete="keyword" />
                                    <x-input-error class="mt-2" :messages="$errors->get('keyword')" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
