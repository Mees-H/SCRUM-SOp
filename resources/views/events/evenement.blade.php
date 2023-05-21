@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-2">
        <div class="col-md">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Data</h3>
                    <p>Evenementen per dag</p>
                </div>

                <ul class="list-unstyled">
                    @isset($allPosts)
                    <li>
                        <a href="/evenement" class="btn btn-outline-dark mt-2">Bekijk alle evenementen</a>
                    </li>
                    @foreach($allPosts as $event)
                    <li class="d-flex">
                        <a href="{{route('evenement.sortByDate', $event->date)}}" class="btn btn-outline-dark mt-2 flex-grow-1">{{$event->date}}</a>
                    </li>
                    @endforeach
                    @else
                    @foreach($posts as $event)
                    <li class="d-flex">
                        <a href="{{route('evenement.sortByDate', $event->date)}}" class="btn btn-outline-dark mt-2 flex-grow-1">{{$event->date}}</a>
                    </li>
                    @endforeach
                    @endisset
                </ul>
            </nav>
        </div>
    </div>
    <div class="col mb-2">
        <div class="container justify-content-between ">
            <div class="row align-items-center">
                <h1 class="col">Evenementen</h1>
                <a class="col-2 btn btn-primary" href="evenement/export">iCal exporteren</a>
            </div>
        </div>
        <div class="container">
        <hr>

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
                <h2>
                        {{$post->title}}
                </h2>
                    <a href="/events/enroll/{{$post->id}}" class="btn-primary btn">Inschrijven</a>
                </div>

                <div>
                    <p>Datum: {{$post->date}} om {{$post->time}}</p>
                    <div class="d-flex justify-content-between">
                        <p class="col-sm-8">
                        {!!$post->body!!}
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
                            <div class="m-3">
                                {{$group->name}}<br>
                                {{$group->street}} {{$group->housenumber}}<br>
                                {{$group->zipcode}} {{$group->city}}<br>
                                <a id="link" href="https://{{$group->link}}">{{$group->link}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </article>
            <hr>
        @endforeach
        </div>
    </div>
</div>
@stop

