@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Evenementen</h1>
        <div>
            <a href="{{ route('members.create')}}" class="btn btn-primary mb-3">Voeg nieuw lid toe</a>
        </div>     
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Naam</td>
                    <td>Email</td>
                    <td>Telefoonnummer</td>
                    <td>Functie</td>
                    <td>Website</td>
                    <td>Groepen</td>
                    <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{$member->id}}</td>
                        <td>{{$member->name}} </td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->phonenumber}}</td>
                        <td>{{$member->function}}</td>
                        <td>{{$member->website}}</td>
                        <td>
                            @foreach($member->groups as $group)
                                {{$group->name}}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('members.edit',$member->id)}}" class="btn btn-primary">Aanpassen</a>
                        </td>
                        <td>
                            <form action="{{ route('members.destroy', $member->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection