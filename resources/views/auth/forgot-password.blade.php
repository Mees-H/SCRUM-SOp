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
        <label for="email" class="col-sm-2 col-form-label">
                <span class="requiredStar">*</span>Email
            </label>
            <div class="col-sm-8">
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required  autofocus>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-primary" type="submit">Stuur E-mail reset link</button>
        </div>
    </form>
@stop
