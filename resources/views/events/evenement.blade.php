@extends('layouts.layout')

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
                            <a href="https://{{$group->link}}">{{$group->link}}</a>
                        </div>
                    @endforeach

                </div>
            </div>
        </article>
        <hr>
    @endforeach
    </div>
@stop

