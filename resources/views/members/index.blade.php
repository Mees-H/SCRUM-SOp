@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Teamleden</h1>
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
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Telefoonnummer</th>
                        <th>Functie</th>
                        <th>Website</th>
                        <th>Foto</th>
                        <th>Groepen</th>
                        <th colspan = 2>Actions</th>
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
                            @if($member->imgurl != '')
                            <td>
                                <div class="memberimg-box">
                                    <img src="{{ asset('img/'.$member->imgurl) }}" alt="foto van {{$member->name}}" class="memberimg"/>
                                </div>
                            </td>
                            @else
                                <td></td>
                            @endif
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