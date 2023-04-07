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
                <form method="POST" action="/admin/submit" class="mt-6 space-y-6">
                    @csrf
                    <div class="row mb-3">
                        <label for="role" class="col-sm-2 col-form-label">
                            Functie
                        </label>
                        <div class="col-sm-8">
                            <select name="role">
                                <option value="coach">
                                    Coach
                                </option>
                                <option value="supervisor">
                                    Begeleider
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">
                            Naam
                        </label>
                        <div class="col-sm-8">
                            <input type="name" class="form-control" id="name" placeholder="bv: jan de graaf" name="name"  value="{{old('name')}}">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">
                            Email adres
                        </label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" placeholder="bv: jan@gmail.com" name="email"  value="{{old('email')}}">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">
                            Wachtwoord
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" placeholder="bv: jan123" name="password" value="{{old('password')}}">
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">
                            Wachtwoord herhalen
                        </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password_confirmation" placeholder="herhaal wachtwoord" name="password_confirmation">
                        </div>
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" id="registreerknop" name="registreerknop" class="btn btn-outline-primary">Registreer gebruiker
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop