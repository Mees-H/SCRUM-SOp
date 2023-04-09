@extends('layouts.layout')

@section('content')
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Wachtwoord vergeten? Geen probleem. We sturen je een wachtwoord reset link op het e-mailadres dat u hieronder invoert.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Stuur E-mail reset link
            </x-primary-button>
        </div>
    </form>
@stop
