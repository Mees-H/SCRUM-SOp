@extends('layouts.layout')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-6 text-gray-900 d-flex justify-content-between">
            <a href="/admin/create" class="btn btn-primary m-1" dusk="createUserButton">{{__('Voeg gebruiker toe')}}</a>
            @if(request()->path() == 'admin/gebruikers/all')
                <a href="/admin/gebruikers" class="btn btn-secondary" dusk="viewActiveUsers">Zie actieve gebruikers</a>
                @else
                <a href="/admin/gebruikers/all" class="btn btn-secondary" dusk="viewAllUsers">Zie alle gebruikers</a>
            @endif

        </div>
    </div>
</div>

<br />

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl table-responsive">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    @if ($title != null)
                        <h1 class="text-center display-3">
                            {{ $title }}
                        </h1>
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
                        <td>{{$user->role}}@if($user->deleted_at !== null )💀 @endif</td>
                        <td>
                            @if($user->deleted_at === null)
                                <form method="post" action="/admin/delete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" dusk="archiveUser{{$user->id}}" class="btn btn-warning">Archiveer gebruiker</button>
                                </form>
                            @else
                                <form method="post" action="/admin/unarchive">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" dusk="dearchiveUser{{$user->id}}" class="btn btn-primary">Dearchiveren</button>
                                </form>

                            @endif
                        </td>
                        <td>
                            @if($user->deleted_at !== null)
                                <form method="post" action="/admin/permanentlydelete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" dusk="permanentlyDeleteUser{{$user->id}}" class="btn btn-danger">Verwijder permanent</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@stop
