<?php

namespace App\Http\Controllers;

use App\Models\Job; // Import the Job model
use App\Services\SettingsService; // Import the SettingsService
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(SettingsService $settingsService)
    {
        $latestJobs = Job::with('company')->latest()->paginate(8); // Fetch 8 latest jobs with their companies, paginated

        $heroTitle = $settingsService->get('hero_title', 'Find Your Dream Job Today');
        $heroDescription = $settingsService->get('hero_description', 'The largest job portal for garments & textiles sector in Bangladesh.');
        $heroImage = $settingsService->get('hero_image', 'https://images.unsplash.com/photo-1554774853-719586f82d77?q=80&w=2070&auto=format&fit=crop');
        $heroButtonText = $settingsService->get('hero_button_text', 'Browse Jobs');
        $heroButtonUrl = $settingsService->get('hero_button_url', url('/jobs'));

        return view('welcome', compact(
            'latestJobs',
            'heroTitle',
            'heroDescription',
            'heroImage',
            'heroButtonText',
            'heroButtonUrl'
        ));
    }
}