@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Evenementen</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a href="{{ route('events.create')}}" class="btn btn-primary">Creeër nieuw evenement</a>
            <a class="btn btn-secondary" href="/evenement">Terug</a>
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
                    <td>Titel</td>
                    <td>Datum</td>
                    <td>Tijd</td>
                    <td>Beschrijving</td>
                    <td>Groepen</td>
                    <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}} </td>
                        <td>{{$event->date}}</td>
                        <td>{{$event->time}}</td>
                        <td>{{$event->body}}</td>
                        <td>
                            @foreach($event->groups as $group)
                                {{$group->name}}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary">Aanpassen</a>
                        </td>
                        <td>
                            <form action="{{ route('events.destroy', $event->id)}}" method="post">
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
