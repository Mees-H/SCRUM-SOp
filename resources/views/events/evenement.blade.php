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
                        <div class="m-3">
                        </div></a>
                    @endforeach

                </div>
            </div>
        </article>
        <hr>
    @endforeach
    </div>
@stop

