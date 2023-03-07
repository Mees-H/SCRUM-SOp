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
                <p>Datum: {{$post->date}}</p>
                {!!$post->body!!}
            </div>
        </article>
        <hr>
    @endforeach
@stop