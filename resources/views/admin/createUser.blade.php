@extends('layouts.layout')

@section('content')

@if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100 display-3">
                    {{ __('Gebruiker aanmaken') }}
                </h1>
                <form method="POST" action="/admin/submit" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <label for="role" class="col-sm-2 col-form-label">
                            Functie
                        </label>
                        <div class="col-sm-8">
                            <select class="@error('role') is-invalid @enderror" name="role" required autofocus>
                                <option value="coach">
                                    Coach
                                </option>
                                <option value="supervisor">
                                    Begeleider
                                </option>
                                <option value="admin">
                                    Beheerder
                                </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="name" class="col-sm-2 col-form-label">
                            Naam
                        </label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="bv: jan de graaf" name="name"  value="{{old('name')}}" required>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="col-sm-2 col-form-label">
                            Email adres
                        </label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="bv: jan@gmail.com" name="email"  value="{{old('email')}}" required>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="col-sm-2 col-form-label">
                            Wachtwoord
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="bv: jan12345" name="password" value="{{old('password')}}">
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="col-sm-2 col-form-label">
                            Wachtwoord herhalen
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="herhaal wachtwoord" name="password_confirmation" required>
                        </div>
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <br />

                    <button type="submit" id="registreerknop" name="registreerknop" class="btn btn-outline-primary">Registreer gebruiker
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
