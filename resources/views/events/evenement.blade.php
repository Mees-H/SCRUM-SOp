@extends('layouts.layout')

@section('content')
    <div class="container justify-content-between ">
        <div class="row align-items-center">
            <h1 class="col">Evenementen</h1>
            <div class="col">
                <a href="/events">Evenementen onderhouden</a>
            </div>
        </div>
    </div>
    <div class="container">
    <hr>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @foreach($posts as $post)
        <article>
            <div class="d-flex justify-content-between align-items-center">
            <h1>
                <a href="/events/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>
                <a href="/events/enroll/{{$post->id}}" class="btn-primary btn">Inschrijven</a>
            </div>

            <div>
                <p>Datum: {{$post->date}} om {{$post->time}}</p>
                <p>{!!$post->body!!}</p>
                <div class="row">
                    @foreach($post->groups as $group)
                        <div class="col-3">
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

