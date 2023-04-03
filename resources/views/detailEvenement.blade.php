@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/EventDetails.css')}}">
        <title>Evenement Details</title>
    </head>
    <div id="bodyDetail">
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
                <a class="text-decoration-none" rel="Link naar de website van de golfclub" href="https://{{$group->link}}">
            <span>
                <i class="bi bi-link fs-2x"></i>
            {{$group->link}}
            </span>
                </a>
            </div>
            <div id="detailsImages" class="justify-content-center d-flex border">
            @foreach($groups as $group)
                <img src="{{$group->imageurl}}" class="border m-3 card shadow" alt="Evenement afbeelding">
            @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-between d-flex">
                <div class="col ">
                    <div class="h5">
                        {{$event->title}} | {{$group->city}}
                    </div>
                    <div>
                        {{$event->body}}
                    </div>
                </div>
                <div class="col justify-content-end d-flex">
                    <div id="cardEvent" class="card shadow ">
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
                                <a class="text-decoration-none " href="https://{{$group->link}}" rel="link naar de website van de golfclub">
                         <span>
                             <i class="bi bi-link fs-2x"></i>
                        {{$group->link}}
                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row container">
                <h4>
                    Teams
                </h4>
                <div class="d-flex card-deck">
                    @foreach($groups as $group)
                        <div id="groupCard" class="card col-sm-3 m-3">
                            <img id="cardImage" src="{{$group->imageurl}}" class="card-img-top" alt="Afbeelding van de golfgroep">
                            <div  class="card-body text-center">
                                <div class="card-title">
                                    <h4>
                                        {{$group->name}}
                                    </h4>
                                </div>
                                <div class="card-text">
                                @if(is_null($group->members))
                                    <div>
                                        Er zijn nog geen personen ingedeeld
                                    </div>
                                @else
                                    <div class="border-bottom">
                                        Ingedeelde personen
                                    </div>
                                    @foreach($group->members as $persons)
                                        <div >
                                            {{$persons->name}}
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
