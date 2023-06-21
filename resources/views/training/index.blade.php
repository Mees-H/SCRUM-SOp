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
        @if ($agent->isMobile())
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Datum</td>
                        <td>Beschrijving</td>
                        <td>Groep</td>
                        <td colspan = 2>Handelingen</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sessions as $session)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($session->Date)->format('d-m-Y')}}</td>
                            <td>{{$session->Description}}</td>
                            <td>Groep {{$session->group_id}}</td>
                            <td>
                                <a href="{{ route('trainingsessions.edit',$session->id)}}" class="btn btn-primary">Aanpassen</a>
                            
                                <form action="{{ route('trainingsessions.destroy', $session->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif

        @if (!$agent->isMobile())
        <div>
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
                        <td colspan = 2>Handelingen</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sessions as $session)
                        <tr>
                            <td>{{$session->Id}}</td>
                            <td>{{ \Carbon\Carbon::parse($session->Date)->format('d-m-Y')}}</td>
                            <td>{{date('H:i', strtotime($session->StartTime))}}</td>
                            <td>{{date('H:i', strtotime($session->EndTime))}}</td>
                            <td>{{$session->Description}}</td>
                            <td>Groep {{$session->group_id}}</td>
                            <td>{{$session->IstrainingSession == 1 ? 'X' : '✓'}}</td>
                            <td>
                                <a href="{{ route('trainingsessions.edit',$session->id)}}" class="btn btn-primary">Aanpassen</a>
                            </td>
                            <td>
                                <form action="{{ route('trainingsessions.destroy', $session->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        
    <div>
</div>
@endsection
