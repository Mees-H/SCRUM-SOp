<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'huidig_wachtwoord' => ['required', 'current_password'],
            'wachtwoord' => ['required', Password::defaults(), 'confirmed'],
        ]);


        $request->user()->update([
            'password' => Hash::make($validated['wachtwoord']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
