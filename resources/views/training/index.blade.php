@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Trainingen</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a id="Creeër nieuwe training" href="{{ route('trainingsessions.create')}}" class="btn btn-primary">Creeër nieuwe training</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Datum</td>
                    <td>Begintijd</td>
                    <td>Eindtijd</td>
                    <td>Beschrijving</td>
                    <td>Groep</td>
                    <td>Vakantieweek</td>
                    <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                    <tr>
                        <td>{{$session->Id}}</td>
                        <td>{{$session->Date}} </td>
                        <td>{{$session->StartTime}}</td>
                        <td>{{$session->EndTime}}</td>
                        <td>{{$session->Description}}</td>
                        <td>Groep {{$session->GroupNumber}}</td>
                        <td>{{$session->IstrainingSession == 1 ? 'X' : '✓'}}</td>
                        <td>
                            <a href="{{ route('trainingsessions.edit',$session->Id)}}" class="btn btn-primary">Aanpassen</a>
                        </td>
                        <td>
                            <form action="{{ route('trainingsessions.destroy', $session->Id)}}" method="post">
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
