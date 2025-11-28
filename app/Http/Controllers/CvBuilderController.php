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
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:500',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // <-- NEW

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

        // 2. Handle image upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('cv_photos', 'public');
        }

        // 3. Prepare data for PDF
        $data = [
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'linkedin' => $validatedData['linkedin'],
            'address' => $validatedData['address'],
            'experiences' => $validatedData['experiences'] ?? [],
            'educations' => $validatedData['educations'] ?? [],
            'skills' => $validatedData['skills'],
            'photo' => $photoPath, // <-- NEW
        ];

        // 4. Generate PDF
        $pdf = PDF::loadView('cv.template', compact('data'));

        Notification::make()
            ->title('CV Generated Successfully!')
            ->success()
            ->send();

        // 5. Download PDF
        return $pdf->download($data['full_name'] . '_CV.pdf');
    }
}