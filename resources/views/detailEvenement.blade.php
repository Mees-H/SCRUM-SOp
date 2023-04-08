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
                <div class="col-sm-2">
                    <a href="/events/enroll/{{$event->id}}" class="btn-primary btn">Inschrijven</a>
                    <a dusk="BackButton" class="btn btn-secondary" href="/evenement">Terug</a>
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
            {{$first_group->street}} {{$first_group->housenumber}}, {{$first_group->city}}
        </span>
                <a class="text-decoration-none" rel="Link naar de website van de golfclub"
                   href="https://{{$first_group->link}}">
            <span>
                <i class="bi bi-link fs-2x"></i>
            {{$first_group->link}}
            </span>
                </a>
            </div>
            <div id="detailsImages" class=" d-lg-flex">
                @foreach($groups as $group)
                    <img src="{{$group->imageurl}}" class="shadow border-0" alt="Evenement afbeelding">
                @endforeach
            </div>
        </div>

        <div class="container d-lg-flex ">
            <div class="row mt-5 justify-content-between">
                <div class="col-sm-6">
                    <h4>
                        {{$event->title}} | {{$first_group->city}}
                    </h4>
                    <div class="mb-4">
                        {{$event->body}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="cardEvent" class="card border-0">
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
                        {{$first_group->street}} {{$first_group->housenumber}}, {{$first_group->city}}
                        </span>
                            </div>
                            <div>
                                <a dusk="WebsiteLink" class="text-decoration-none " href="https://{{$first_group->link}}"
                                   rel="link naar de website van de golfclub">
                         <span>
                             <i class="bi bi-link fs-2x"></i>
                        {{$first_group->link}}
                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
