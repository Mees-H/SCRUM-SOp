@extends('layouts.layout')
 
@section('content')
    <h1>Evenementen</h1>

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