<?php

namespace App\Http\Controllers;

use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use PDF; // Import the PDF facade from barryvdh/laravel-dompdf
use Illuminate\Support\Facades\Storage; // Import Storage facade

class CvBuilderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:500',
            'experiences' => 'nullable|array',
            'experiences.*.job_title' => 'nullable|string|max:255',
            'experiences.*.company' => 'nullable|string|max:255',
            'experiences.*.start_date' => 'nullable|date',
            'experiences.*.end_date' => 'nullable|date',
            'experiences.*.responsibilities' => 'nullable|string',
            'educations' => 'nullable|array',
            'educations.*.degree' => 'nullable|string|max:255',
            'educations.*.institution' => 'nullable|string|max:255',
            'educations.*.graduation_date' => 'nullable|date',
            'skills' => 'nullable|string',
        ]);

        // For simplicity, handling single experience and education.
        // If the form were dynamic, these would be arrays.
        $data = [
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'linkedin' => $validatedData['linkedin'],
            'address' => $validatedData['address'],
            'experiences' => $validatedData['experiences'] ?? [],
            'educations' => $validatedData['educations'] ?? [],
            'skills' => $validatedData['skills'],
        ];

        // 2. Pass the validated data to the CV Blade template
        $pdf = PDF::loadView('cv.template', compact('data'));
        Notification::make()
            ->title('Cache cleared successfully!')
            ->success()
            ->send();
        // 3. Return the generated PDF as a download
        return $pdf->download($data['full_name'] . '_CV.pdf');
    }
}