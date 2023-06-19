@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Trainingen</h1>
    @foreach($trainingGroups as $group)

        <h2>Traininggroep {{$group->id}}</h2>
        <div class="table-container">
            <table tabindex=0 class="table table-bordered w-auto">
                <tr>
                    <th>Datum</th>
                    @foreach($group->sessions as $session)
                        <td class="p-1 verticalText text-center">
                            <p class="m-0">{{ \Carbon\Carbon::parse($session->Date)->format('d-m-Y')}}</p>
                        </td>
                    @endforeach
                </tr>
                <tr>
                <th>Tijd</th>
                @foreach($group->sessions as $session)
                    <td class="p-1 small verticalText">{{date('H:i', strtotime($session->StartTime))}}-{{date('H:i', strtotime($session->EndTime))}}</td>
                @endforeach
                </tr>
                <tr>
                    <th>Week</th>
                    @foreach($group->sessions as $session)
                        <td class="p-1 verticalText">W{{$session->weekNumber}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Leden</th>
                    @foreach($group->sessions as $session)
                        @if(!$session->IstrainingSession)
                            <div class="col-auto">{{$session->weekDay}} {{$session->day}} {{$session->month}}</div>
                            <div class="col-auto">{{$session->Description}}</div>
                            @php($sessionAmount++)
                        @else
                            <div class="col-auto">{{$session->weekDay}} {{$session->day}} {{$session->month}}</div>
                            <div class="col-auto">{{date('H:i', strtotime($session->StartTime))}}-{{date('H:i', strtotime($session->EndTime))}}</div>
                            <div class="col-auto">{{$session->training_session_group->Name}}</div>
                            <div class="col-auto">{{$session->Description}}</div>
                            @php($sessionAmount++)
                        @endif
                    @endif
                    </div>
                @endforeach
                @if($sessionAmount === 0)
                    <div class="row justify-content-center">
                        <div class="col-auto">Er zijn nog geen trainingen deze week</div>
                    </div>
                @endif
            </div>
            <hr>
        @endfor
    </div>
    <br>
    <div class="container text-center">
        <div class="row">
            @for($i = 0; $i < $groups->count(); $i++)
                @if($i === 0)
                <div class="col">
                @else
                <div class="col border-start">
                @endif
                    <h2>{{$groups[$i]->Name}}</h2>
                    @foreach($groups[$i]->participants as $participant)
                        <p>{{$participant->Name}}</p>
                    @endforeach
                </div>
            @endfor
        </div>
    </div>
</div>
@stop
