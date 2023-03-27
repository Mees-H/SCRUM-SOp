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
        <img src="{{asset('img/specialgolflogodark.png')}}" class="" alt="Evenement afbeelding">
    </div>
    <div class="container mt-5 ">
        <div class="row justify-content-center">

            <div class="col-sm-6 font-normal">
                <h3>
                    {{$group->name}}
                </h3>
                {{$event->body}}
            </div>

        <div class="col-sm-3 d-flex">
            <div class="card border shadow  ">
            <div class="card-header text-center">
            Het Evenement
            </div>
            <div class="card-body text-left">
            <div>
                <span>
                 <i class="bi bi-calendar-check fs-2x"></i>
                    {{date('H:i', strtotime($event->time))}} {{$event->date}}
                </span>
            </div>
                <div>
                <span>
                <i class="bi bi-clock fs-2x"></i>
                    {{$group->city}}
                </span>
                </div>
                <div>
                <span>
                <i class="bi bi-clock fs-2x"></i>
                    {{$group->street}} {{$group->housenumber}}
                </span>
                </div>
                <div>
                <span>
                <i class="bi bi-clock fs-2x"></i>
                    {{$group->link}}
                </span>
            </div>
    </div>
    </div>
</div>


@stop
