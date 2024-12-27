<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the user's profile editing form.
     */
    public function edit(Request $request): View
    {
        // Return the 'edit profile' view with the current user data
        return view('profile.edit', [
            'user' => $request->user(), // Pass the logged-in user's data to the view
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Fill the user with the validated data from the form
        $user = $request->user();
        $user->fill($request->validated());

        // If the email was changed, mark it as unverified
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save the updated user data to the database
        $user->save();

        // Redirect back to the edit profile page with a success message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate that the user entered the correct current password before deleting
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'], // Ensure the password matches the current password
        ]);

        // Get the logged-in user
        $user = $request->user();

        // Log the user out of the system
        Auth::logout();

        // Delete the user from the database
        $user->delete();

        // Invalidate the session and regenerate the CSRF token to log the user out securely
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage after account deletion
        return Redirect::to('/');
    }
}
