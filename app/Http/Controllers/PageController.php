<?php

namespace App\Http\Controllers;

use App\Models\Page; // Import the Page model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View; // Import View facade

class PageController extends Controller
{
    /**
     * Display the specified custom page.
     */
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)
                    ->where('status', 'published')
                    ->firstOrFail();

        // You might want to use a specific layout for custom pages
        // For now, let's assume a simple 'page.show' view
        return view('pages.show', compact('page'));
    }
}
