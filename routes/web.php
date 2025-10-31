<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('jobs', 'jobs');
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
