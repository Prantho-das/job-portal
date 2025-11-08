<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Add this line
use App\Http\Controllers\HomeController; // Add this line
use App\Http\Controllers\CvBuilderController; // Import CvBuilderController
use App\Http\Controllers\DashboardController; // Import DashboardController
use App\Http\Controllers\ProfileController; // Import ProfileController
use App\Http\Controllers\ApplicationController; // Import ProfileController

Route::get('/', [HomeController::class, 'index']);

Route::get('jobs', [JobController::class, 'index'])->name('jobs');
Route::get('companies', [CompanyController::class, 'index'])->name('companies');

Route::get('job-detail/{job:slug}', [JobController::class, 'show'])->name('job-detail');

Route::get('build-cv', function () {
    $settingsService = app(\App\Services\SettingsService::class);
    $buildCvTitle = $settingsService->get('build_cv_title', 'Build Your Professional CV');
    $buildCvDescription = $settingsService->get('build_cv_description', 'Fill out the sections below to create a comprehensive CV that you can use to apply for jobs.');
    $buildCvContent = $settingsService->get('build_cv_content', '');

    return view('build-cv', compact('buildCvTitle', 'buildCvDescription', 'buildCvContent'));
})->name('build-cv');

Route::post('build-cv', [CvBuilderController::class, 'store'])->name('cv.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('profile/edit', [ProfileController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('profile.edit');

Route::patch('/profile', [ProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('profile.update');

Route::get('applied-jobs', [ApplicationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('applied-jobs.index');

require __DIR__.'/auth.php';


Route::post('jobs/{job:slug}/apply', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*')->name('page.show');
