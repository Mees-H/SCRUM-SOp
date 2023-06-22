<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'id'=> ['required', 'exists:users,id', 'not_in:'.auth()->user()->id],
        ]);

        User::find($request->id)->delete();

        return back()->with('success', 'Account gearchiveerd!');
    }

    public function permanentlyDelete(Request $request): RedirectResponse
    {
        $request->validate([
            'id'=> [
                'required',
                Rule::exists('users', 'id')->whereNotNull('deleted_at'),
                'not_in:'.auth()->user()->id,
            ],
        ]);

        User::withTrashed()->find($request->id)->forceDelete();

        return back()->with('success', 'Account permanent verwijderd!');
    }

    public function unarchive(Request $request): RedirectResponse
    {
        $request->validate([
            'id'=> [
                'required',
                Rule::exists('users', 'id')->whereNotNull('deleted_at'),
                'not_in:'.auth()->user()->id,
            ],
        ]);

        User::withTrashed()->find($request->id)->restore();

        return back()->with('success', 'Account hersteld!');
    }
}
