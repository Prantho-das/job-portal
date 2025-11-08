<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Add this line

use App\Http\Controllers\HomeController; // Add this line

Route::get('/', [HomeController::class, 'index']);

Route::get('jobs', [JobController::class, 'index'])->name('jobs');
Route::view('companies', 'companies');

Route::view('job-detail', 'job-detail');

Route::view('build-cv', 'build-cv');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Route for custom pages
Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*')->name('page.show');
