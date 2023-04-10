<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CreateUserController extends Controller
{
    public function adminindex()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('admin.userlist', ['users' => $users, 'title' => 'Actieve gebruikers']);
    }

    public function showAll()
    {
        $users = User::where('id', '!=', auth()->user()->id)->withTrashed()->get();

        return view('admin.userlist', ['users' => $users, 'title' => 'Alle gebruikers']);
    }

    public function adminCreateUser()
    {
        return view('admin.createUser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => 'required'
        ]);

        //ddd($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        event(new Registered($user));

        return redirect('/admin/gebruikers')->with('success', 'Gebruiker aangemaakt!');
    }
}
