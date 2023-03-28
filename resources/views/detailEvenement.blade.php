@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/EventDetails.css')}}">
<div>
    <div class="container">
    <div class=" justify-content-between d-flex pt-3">
            <h1 class="darkTitle">
                {{$event->title}}
            </h1>
        <div class="col-sm-1">
            <a class="btn btn-secondary" href="/evenement">Terug</a>
        </div>
    </div>

    <div class="justify-content-between mb-3 mt-3">
        <span>
            <i class="bi bi-calendar-check"></i>
           {{$event->date}}
        </span>
        <span>
            <i class="bi bi-clock fs-2x"></i>
          {{date('H:i', strtotime($event->time))}}
        </span>
        <span>
            <i class="bi bi-geo fs-2x"></i>
            {{$group->street}} {{$group->housenumber}}, {{$group->city}}
        </span>

        <a class="text-decoration-none"  href="https://{{$group->link}}">
        <span>
                <i class="bi bi-link fs-2x"></i>
            {{$group->link}}
        </span>
        </a>
    </div>

    <div class="justify-content-center d-flex p-3 border">
        <img src="{{asset('img/specialgolflogodark.png')}}" class="" alt="Evenement afbeelding">
    </div>

    </div>

    <div class="row mt-5 container justify-content-center">
        <div class="col-sm-8">
            <div class="h5">
                {{$event->title}} | {{$group->city}}
            </div>
            <div>
                {{$event->body}}
            </div>
        </div>
        <div class="col-sm-3 d-flex">
            <div class="card border shadow ">
                <div id="cardHeaderEvent" class="card-header text-center">
                 Het Evenement
                </div>
                <div class="card-body text-left">
                    <div>
                        <span>
                             <i class="bi bi-calendar-check fs-2x"></i>
                                {{$event->date}}
                        </span>
                     </div>

                    <div>
                        <span>
                        <i class="bi bi-clock fs-2x"></i>
                            {{date('H:i', strtotime($event->time))}}

                        </span>
                    </div>
                    <div>
                        <span>
                        <i class="bi bi-geo fs-2x"></i>
                        {{$group->street}} {{$group->housenumber}}, {{$group->city}}
                        </span>
                    </div>
                    <div>
                        <a class="text-decoration-none " href="https://{{$group->link}}">
                         <span>
                             <i class="bi bi-link fs-2x"></i>
                        {{$group->link}}
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h3>
                Groepen
            </h3>
            <div class="d-flex justify-content-center">
            @foreach($groups as $group)
                <div class="card border shadow col-sm-3 m-3">
                    <div id="cardHeaderGroups" class="card-header text-center">
                        {{$group->name}}
                    </div>
                    <div class="card-body text-left">
                        @if(is_null($group->people))
                            <div class="title">
                                Er zijn nog geen personen ingedeeld
                            </div>
                        @else
                            <div class="title">
                                Ingedeelde personen
                            </div>
                            @foreach($group->people as $persons)
                                <div>
                                    naam: blabla
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</div>


@stop
