@extends('layouts.layout')

@section('content')
<div class="container">
    <form class="row justify-content-center d-flex" action="/training" method="post">
        @csrf
        <input type="hidden" name="year" value="{{$year}}"/>
        <button class="btn btn-primary col-auto" type="submit" name="weekNumber" value="{{$weekFrom - 4}}" aria-label="Knop om vorige 4 weken te bekijken">
            <i class="fa-solid fa-caret-left"></i>
        </button>
        <div class="col-auto">
            <h3 class="text-center">{{$year}}</h3>
            <h3 class="text-center">Week {{$weekFrom}} - {{$weekTo}}</h3>
        </div>
        <button class="btn btn-primary col-auto" type="submit" name="weekNumber" value="{{$weekFrom + 4}}" aria-label="Knop om volgende 4 weken te bekijken">
            <i class="fa-solid fa-caret-right"></i>
        </button>
    </form>
    <hr>
    <div class="container text-center">
        @for($i = $weekFrom; $i <= $weekTo; $i++)
            <div class="row justify-content-center">
                <h5>Week {{$i}}</h5>
                @php($sessionAmount = 0)
                @foreach($sessions as $session)
                    <div class="row justify-content-center">
                    @if($session->weekNumber == $i && $session->year == $year)
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
