<?php

namespace App\Http\Controllers;

use App\Models\Job; // Import the Job model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestJobs = Job::with('company')->latest()->take(8)->get(); // Fetch 8 latest jobs with their companies

        return view('welcome', compact('latestJobs'));
    }
}