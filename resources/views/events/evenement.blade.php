@extends('layouts.layout')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/EventDetails.css') }}">
        <title>Events</title>
    </head>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="col-md">
                    <!-- Sidebar -->
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3>Data</h3>
                            <p>Evenementen per dag</p>
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-primary" href="evenement/export" autofocus>Agenda exporteren</a>
                            </div>
                        </div>
                        <ul class="list-unstyled">
                            @foreach($posts as $event)
                                <li class="d-flex">
                                    <a href="{{route('eventsDetails', $event->id)}}"
                                       class="btn btn-secondary mt-2 flex-grow-1" rel="{{$event->title}} details knop">
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
                                <label>Datum: <b>{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y')}}</b>
                                    om <b>{{date('H:i', strtotime($post->time))}}</b></label>
                                <br/>
                                @if($post->price <= 0)
                                    <p>Prijs: Gratis</p>
                                @else
                                    <p>Prijs: €{{number_format($post->price, 2, ',', '')}}<p>
                                @endif

                                <div class="d-flex justify-content-between">
                                    <p class="col-sm-8">
                                        @if(strpos($post->body,".") !== false)
                                            {!!str_split($post->body,strpos($post->body,"."))[0]!!}...
                                        @else
                                            {!!substr($post->body, 0, 200)!!}
                                            @if(strlen($post->body) > 200)
                                                ...
                                            @endif
                                        @endif
                                    </p>
                                    <div>
                                        <a dusk="ButtonToDetailsEvent" href="{{route('eventsDetails', $post->id)}}"
                                           class="btn btn-secondary" rel="Knop naar de details pagina">
                                            Meer informatie <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    @foreach($post->groups as $group)
                                        <a href="https://{{$group->link}}">
                                            <div class="fullwrap m-3">
                                                <img class="sponsor_img" alt="logo van {{$group->name}}"
                                                     src="{{asset('img/'.$group->imageurl)}}">
                                                <div class="fullcap text-wrap">
                                                    <div>{{$group->name}}</div>
                                                    <div class="text-center">{{$group->zipcode}}, {{$group->city}}</div>
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
