@extends('layouts.layout')

@section('content')
    <div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>E-mail
                </label>
                <div class="col-sm-8">
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Wachtwoord
                </label>
                <div class="col-sm-8">
                    <input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password">
                </div>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Onthoud mijn gegevens</span>
                </label>
            </div>
            
            <div class='mt-2'>
                <button class="btn btn-primary" type="submit">Inloggen</button>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            
            <div class="flex items-center justify-end mt-2">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        Wachtwoord vergeten?
                    </a>
                @endif
            </div>
        </form>
    </div>
@stop
