@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Evenementen</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a href="{{ route('events.create')}}" class="btn btn-primary" dusk="create-event-button">Creeër nieuw evenement</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($agent->isMobile())
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Titel</td>
                        <td>Datum</td>
                        <td>Tijd</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->title}} </td>
                            <td>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y')}}</td>
                            <td>{{date('H:i', strtotime($event->time))}}</td>
                            <tr>
                                <td>
                                    <a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary" dusk="edit-event-button">Aanpassen</a>
                                </td>
                                <td>
                                    <form action="{{ route('events.destroy', $event->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" dusk="remove-event-button">Verwijderen</button>
                                    </form>
                                </td>
                            </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
        @endif

        @if (!$agent->isMobile())
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Titel</td>
                        <td>Datum</td>
                        <td>Tijd</td>
                        <td>Prijs</td>
                        <td>Rekeningnummer</td>
                        <td>Beschrijving</td>
                        <td>Groepen</td>
                        <td colspan = 2>Handelingen</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->title}} </td>
                            <td>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y')}}</td>
                            <td>{{date('H:i', strtotime($event->time))}}</td>
                            <td>€{{number_format($event->price, 2, ',', ' ')}}</td>
                            <td>{{$event->bankaccount}}</td>
                            <td>{{Str::limit($event->body, 100)}}</td>
                            <td>
                                @foreach($event->groups as $group)
                                    {{$group->name}}<br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary" dusk="edit-event-button">Aanpassen</a>
                            </td>
                            <td>
                                <form action="{{ route('events.destroy', $event->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" dusk="remove-event-button">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
        @endif
    <div>
</div>
@endsection
