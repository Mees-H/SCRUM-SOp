@extends('layouts.layout')

@section('content')

    <h1>Trainingen</h1>
    @foreach($trainingGroups as $group)

    <h2>Traininggroep {{$group->GroupNumber}}</h2>
    <table class="table table-bordered w-auto">
            <tr>
                <th>Datum</th>
                @foreach($group->sessions as $session)
                <td>
                    <p class="verticalText text-wrap">{{$session->Date}}</p>
                </td>
                @endforeach
            </tr>
            <tr>
                <th>Week</th>
                @foreach($group->sessions as $session)
                <td>W{{$session->weekNumber}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Leden</th>
                @foreach($group->sessions as $session)
                @if(!$session->IstrainingSession)
                <td rowspan='{{$group->participants->count()+1}}' class="test vacationSession verticalText text-center">{{$session->Description}}</td>
                @else
                <td rowspan='{{$group->participants->count()+1}}' class="test verticalText text-center">
                    {{$session->Description}}
                </td>
                @endif
                @endforeach
            </tr>
            @foreach($group->participants as $participant)
            <tr>
                <td>{{$participant->Name}}</td>
            </tr>
            @endforeach
    </table>
    @endforeach

@stop
