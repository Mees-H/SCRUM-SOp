@extends('layouts.layout')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-6 text-gray-900 d-flex justify-content-between">
            <a href="/admin/create" class="btn btn-primary m-1" dusk="createUserButton" autofocus>{{__('Voeg account toe')}}</a>
            @if(request()->path() == 'admin/accounts/all')
                <a href="/admin/accounts" class="btn btn-secondary" dusk="viewActiveUsers">Zie actieve accounts</a>
                @else
                <a href="/admin/accounts/all" class="btn btn-secondary" dusk="viewAllUsers">Zie alle accounts</a>
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
                    <th>{{__('Account naam')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Functie')}}</th>
                    <th></th>
                    <th></th>
                    </thead>

                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}@if($user->deleted_at !== null )📁 @endif</td>
                        <td>
                            @if($user->deleted_at === null)
                                <form method="post" action="/admin/delete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" dusk="archiveUser{{$user->id}}" class="btn btn-warning w-75">Archiveer account</button>
                                </form>
                            @else
                                <form method="post" action="/admin/unarchive">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" dusk="dearchiveUser{{$user->id}}" class="btn btn-primary w-75">Dearchiveren</button>
                                </form>

                            @endif
                        </td>
                        <td>
                            @if($user->deleted_at !== null)
                                <form method="post" action="/admin/permanentlydelete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" dusk="permanentlyDeleteUser{{$user->id}}" class="btn btn-danger w-75">Verwijder permanent</button>
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
