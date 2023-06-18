@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Trainingen</h1>
    <form class="row justify-content-center d-flex" action="/training" method="post">
        @csrf
        <button class="btn btn-primary col-1" type="submit" name="weekNumber" value="{{$weekFrom - 4}}" aria-label="Knop om vorige 4 weken te bekijken">
            <i class="fa-solid fa-caret-left"></i>
        </button>
        <div class="col-3">
            <h3 class="text-center">{{$year}}</h3>
            <h3 class="text-center">Week {{$weekFrom}} - {{$weekTo}}</h3>
        </div>
        <button class="btn btn-primary col-1" type="submit" name="weekNumber" value="{{$weekFrom + 4}}" aria-label="Knop om volgende 4 weken te bekijken">
            <i class="fa-solid fa-caret-right"></i>
        </button>
    </form>
    <hr>
    <div class="container text-center">
        @for($i = $weekFrom; $i <= $weekTo; $i++)
            <div class="row justify-content-md-center">
                <h5>Week {{$i}}</h5>
                @foreach($sessions as $session)
                    @if($session->weekNumber == $i)
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">{{$session->weekDay}} {{$session->day}} {{$session->month}}</div>
                            <div class="col-md-auto">{{$session->StartTime}}-{{$session->EndTime}}</div>
                            <div class="col-md-auto">{{$session->training_session_group->Name}}</div>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr>
        @endfor
    </div>
</div>
@stop
