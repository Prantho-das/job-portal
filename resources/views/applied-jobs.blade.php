<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applied Jobs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Your Applied Jobs') }}
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Here's a list of jobs you have applied for.") }}
                </p>

                <div class="mt-6 space-y-4">
                    @forelse ($appliedJobs as $application)
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-5 bg-white dark:bg-gray-700 rounded-xl shadow-md hover:shadow-lg transition-all duration-200">
                            <div class="mb-3 sm:mb-0">
                                <a href="{{ route('job-detail', $application->job->slug) }}" class="text-xl font-bold text-gray-900 dark:text-gray-100 hover:text-red-600 transition-colors duration-200">
                                    {{ $application->job->title }}
                                </a>
                                <p class="text-md text-gray-700 dark:text-gray-300 mt-1">{{ $application->job->company->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Applied on: {{ $application->created_at->format('M d, Y') }}</p>
                            </div>
                            <span class="px-4 py-2 text-sm font-semibold rounded-full
                                @if($application->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                @elseif($application->status === 'reviewed') bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100
                                @elseif($application->status === 'accepted') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @endif">
                                {{ ucfirst($application->status) }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-600 dark:text-gray-400">{{ __("You haven't applied for any jobs yet.") }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
