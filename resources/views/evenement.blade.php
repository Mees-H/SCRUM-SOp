@extends('layouts.layout')
 
@section('content')
    <div class="container text-center">
        <div class="row align-items-center">
            <h1 class="col">Evenementen</h1>
            <div class="col">
                <a class="btn btn-primary" href="/events">Evenementen onderhouden</a>
            </div>
        </div>
    </div>

    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/events/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>

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
@stop