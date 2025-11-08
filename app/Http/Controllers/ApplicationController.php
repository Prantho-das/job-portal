<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ApplicationController extends Controller
{
    public function store(Request $request, Job $job)
    {
        $rules = [
            'cv_file' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'], // Max 2MB
            'agree' => ['required', 'accepted'],
        ];

        if (Auth::guest()) {
            $rules['full_name'] = ['required', 'string', 'max:255'];
            $rules['email'] = ['required', 'string', 'email', 'max:255'];
            $rules['mobile'] = ['nullable', 'string', 'max:20'];
        }

        $validatedData = $request->validate($rules);

        // Handle CV file upload
        $cvPath = $request->file('cv_file')->store('cvs', 'public');

        $applicationData = [
            'job_id' => $job->id,
            'name' => Auth::check() ? Auth::user()->name : $validatedData['full_name'],
            'email' => Auth::check() ? Auth::user()->email : $validatedData['email'],
            'phone' => Auth::check() ? (Auth::user()->mobile ?? ($validatedData['mobile'] ?? null)) : ($validatedData['mobile'] ?? null),
            'cv_path' => $cvPath,
            'status' => 'pending',
        ];

        if (Auth::check()) {
            $applicationData['user_id'] = Auth::id();
        }

        Application::create($applicationData);

        return back()->with('success', 'Your application has been submitted successfully!');
    }
}