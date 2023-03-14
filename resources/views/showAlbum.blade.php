@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('/css/Album.css')}}">
        <title>Show Album</title>
    </head>
    <body>

        <div class="col justify-content-start">
            <button class="btn btn-outline-secondary mt-4 text-right" name="Terugknop naar galerij" onclick="window.location='{{url("/galerij/{$year}")}}'">Terug</button>
        </div>
            <div class="col text-center">

            <h1>{{$album->date }} | {{$album->title}}</h1>
            <article>
                {{$album->description}}
            </article>
            </div>
            <div class="album py-5 container">
            <div class="row">
                @foreach($pictures as $picture)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="{{$picture->imageUrl}}" alt="Afbeelding {{$picture->id}} uit album {{$album->title}}">
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
    </body>
@stop
