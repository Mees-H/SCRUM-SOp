@extends('layouts.layout')
<head>
    <link rel="stylesheet" href="{{ asset('css/EventDetails.css') }}">
</head>
@section('content')
<div class="container justify-content-between ">
    <div class="row align-items-center">
        <h1 class="col">Evenementen</h1>
    </div>
</div>
<div class="container">
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="col-md">
                <!-- Sidebar -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h3>Data</h3>
                        <p>Evenementen per dag</p>
                        <div class="col d-flex justify-content-center">
                            <a class="btn btn-primary" href="evenement/export">Agenda exporteren</a>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        @foreach($posts as $event)
                        <li class="d-flex">
                            <a href="{{route('eventsDetails', $event->id)}}" class="btn btn-secondary mt-2 flex-grow-1" rel="{{$event->title}} details knop">
                                <p>{{$event->title}}</p>
                                <p>{{$event->date}}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @elseif(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <div>
            @foreach($posts as $post)
            <article>
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{$post->title}}</h2>
                    <a href="/events/enroll/{{$post->id}}" class="btn-primary btn">Inschrijven</a>
                </div>
            <div>
                <label>Datum: {{$post->date}} om {{$post->time}}</label>
                <br />
                @if($post->price <= 0)
                    <p>Prijs: Gratis</p>
                @else
                    <p>Prijs: €{{number_format($post->price, 2, ',', '')}}<p>
                @endif

                <div class="d-flex justify-content-between">
                    <p class="col-sm-8">
                    {!!str_split($post->body,strpos($post->body,"."))[0]!!}...
                    </p>
                    <div>
                        <a dusk="ButtonToDetailsEvent" href="{{route('eventsDetails', $post->id)}}" class="btn btn-secondary" rel="Knop naar de details pagina">
                            Meer informatie <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="d-flex">
                    {{--                    TODO: Moet nog worden vervangen met 1 locatie--}}
                    @foreach($post->groups as $group)
                    <a href="https://{{$group->link}}">
                        <div class="fullwrap m-3">
                            <img style="height: 12vh;" alt="logo van {{$group->name}}" src="{{$group->imageurl}}">
                            <div class="fullcap text-wrap">
                                <div>{{$group->name}}</div>
                                <div>{{$group->zipcode}}, {{$group->city}}</div>
                            </div>
                        </div>
                    </a>
                        @endforeach
                    </div>
                </div>
            </article>
            <hr>
            @endforeach
            </div>
        </div>
    </div>
</div>
@stop

