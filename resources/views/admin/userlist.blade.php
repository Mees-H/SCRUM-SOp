@extends('layouts.layout')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 text-gray-900">
            <a href="/admin/create" class="btn btn-primary m-1">{{__('Voeg gebruiker toe')}}</a>
        </div>
    </div>
</div>

<br />

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                    <th>{{__('Gebruikersnaam')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Functie')}}</th>
                    <th></th>
                    </thead>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <form method="post" action="/admin/delete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-outline-secondary">{{__('Verwijder gebruiker')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@stop
