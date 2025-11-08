<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Add this line
use App\Http\Controllers\HomeController; // Add this line

Route::get('/', [HomeController::class, 'index']);

Route::get('jobs', [JobController::class, 'index'])->name('jobs');
Route::get('companies', [CompanyController::class, 'index'])->name('companies');

Route::get('job-detail/{job:slug}', [JobController::class, 'show'])->name('job-detail');

Route::view('build-cv', 'build-cv');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

use App\Http\Controllers\ApplicationController; // Add this line

Route::post('jobs/{job:slug}/apply', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*')->name('page.show');