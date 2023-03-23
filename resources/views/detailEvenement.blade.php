@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/EventDetails.css')}}">
<div>
    <div class="container justify-content-between d-flex pt-3 border-bottom">
            <h1 class="darkTitle">
                {{$event->title}}
            </h1>
        <div>
            <a class="btn btn-secondary" href="/evenement">Terug</a>
        </div>
    </div>
    <div class="justify-content-center d-flex p-3">
        <img src="{{asset('img/specialgolflogodark.png')}}" class="img-fluid" alt="Responsive image">
    </div>
    <div class="container mt-5 d-flex">
        <div class="row justify-content-center">
            <div class="col-sm-6 font-normal">
                {{$event->body}}
            </div>
        <div class="col-sm-3 card border shadow p-2 text-center">
            Algemeen
            <div>
                <object data="{{asset('Icons/clock.svg')}}" type="image/svg+xml" class="img-fluid" "></object>
                {{$event->date}} / {{date('H:i', strtotime($event->time))}}
            </div>

        </div>
        </div>
    </div>

</div>


@stop
