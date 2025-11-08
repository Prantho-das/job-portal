<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $query = Company::withCount('jobs') // Eager load job count for each company
                        ->where('status', 'active'); // Only show active companies

        // Apply filters
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('description', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('industry', 'like', '%' . $request->input('search') . '%');
            });
        }

        if ($request->filled('location')) {
            $query->where(function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->input('location') . '%')
                  ->orWhere('country', 'like', '%' . $request->input('location') . '%');
            });
        }

        if ($request->filled('industry')) {
            $query->where('industry', 'like', '%' . $request->input('industry') . '%');
        }

        $companies = $query->latest()->paginate(10);

        // Get unique industries for filter options
        $industries = Company::select('industry')->distinct()->pluck('industry');

        return view('companies', compact('companies', 'industries'));
    }
}