<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Seeker Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Dashboard Overview / Navigation Cards --}}
            <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="{{ route('profile.edit') }}" class="block p-6 bg-white shadow-xl sm:rounded-lg hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">
                        {{ __('Edit Profile') }}
                    </h3>
                    <p class="text-gray-600">
                        {{ __("Update your account's profile information and email address.") }}
                    </p>
                </a>

                <a href="{{ route('applied-jobs.index') }}" class="block p-6 bg-white shadow-xl sm:rounded-lg hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">
                        {{ __('View Applied Jobs') }}
                    </h3>
                    <p class="text-gray-600">
                        {{ __("See a list of all the jobs you have applied for.") }}
                    </p>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
