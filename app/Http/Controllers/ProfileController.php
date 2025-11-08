<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile-edit', [
            'user' => $request->user(),
            'profile' => $request->user()->profile,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            'first_name' => ['nullable', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'father_name' => ['nullable', 'string', 'max:100'],
            'mother_name' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'max:10'],
            'religion' => ['nullable', 'string', 'max:20'],
            'dob' => ['nullable', 'date'],
            'nid' => ['nullable', 'string', 'max:20'],
            'phone' => ['nullable', 'string', 'max:20'],
            'secondary_phone' => ['nullable', 'string', 'max:20'],
            'secondary_email' => ['nullable', 'string', 'email', 'max:100'],
            'present_address' => ['nullable', 'string'],
            'permanent_address' => ['nullable', 'string'],
            'objective' => ['nullable', 'string', 'max:255'],
            'present_salary' => ['nullable', 'numeric'],
            'expected_salary' => ['nullable', 'numeric'],
            'job_level' => ['nullable', 'string', 'max:20'],
            'job_nature' => ['nullable', 'string', 'max:20'],
            'career_summary' => ['nullable', 'string'],
            'special_qualification' => ['nullable', 'string', 'max:255'],
            'keyword' => ['nullable', 'string', 'max:255'],
        ]);

        $user->fill($request->only(['name', 'email']));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $profileData = $request->only([
            'first_name', 'last_name', 'father_name', 'mother_name', 'gender', 'religion', 'dob', 'nid',
            'phone', 'secondary_phone', 'secondary_email', 'present_address', 'permanent_address',
            'objective', 'present_salary', 'expected_salary', 'job_level', 'job_nature',
            'career_summary', 'special_qualification', 'keyword'
        ]);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
