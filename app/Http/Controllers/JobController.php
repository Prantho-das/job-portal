<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EducationLevel;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with(['company', 'categories', 'educationLevels'])
                    ->where('status', 'active');

        // Apply filters
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('description', 'like', '%' . $request->input('search') . '%')
                  ->orWhereHas('company', function ($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->input('search') . '%');
                  });
            });
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->input('job_type'));
        }

        if ($request->filled('salary_min')) {
            $query->where('salary_min', '>=', $request->input('salary_min'));
        }

        if ($request->filled('salary_max')) {
            $query->where('salary_max', '<=', $request->input('salary_max'));
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->input('category'));
            });
        }

        if ($request->filled('education_level')) {
            $query->whereHas('educationLevels', function ($q) use ($request) {
                $q->where('education_levels.id', $request->input('education_level'));
            });
        }

        $jobs = $query->latest()->paginate(10);

        $categories = Category::all();
        $educationLevels = EducationLevel::all();
        $jobTypes = ['full-time', 'part-time', 'remote', 'contract']; // From Job migration enum

        return view('jobs', compact('jobs', 'categories', 'educationLevels', 'jobTypes'));
    }

    public function show(Job $job)
    {
        $job->load(['company', 'categories', 'educationLevels']); // Eager load relationships

        return view('job-detail', compact('job'));
    }
}
