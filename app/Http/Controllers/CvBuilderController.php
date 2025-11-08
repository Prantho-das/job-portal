<?php

namespace App\Http\Controllers;

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
            'job_title' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'responsibilities' => 'nullable|string',
            'degree' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'graduation_date' => 'nullable|date',
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
            'experiences' => [],
            'educations' => [],
            'skills' => $validatedData['skills'],
        ];

        if (!empty($validatedData['job_title'])) {
            $data['experiences'][] = [
                'job_title' => $validatedData['job_title'],
                'company' => $validatedData['company'],
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
                'responsibilities' => $validatedData['responsibilities'],
            ];
        }

        if (!empty($validatedData['degree'])) {
            $data['educations'][] = [
                'degree' => $validatedData['degree'],
                'institution' => $validatedData['institution'],
                'graduation_date' => $validatedData['graduation_date'],
            ];
        }

        // 2. Pass the validated data to the CV Blade template
        $pdf = PDF::loadView('cv.template', compact('data'));

        // 3. Return the generated PDF as a download
        return $pdf->download($data['full_name'] . '_CV.pdf');
    }
}
