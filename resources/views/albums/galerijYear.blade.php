@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('/css/Album.css')}}">
        <title>Galerij</title>
    </head>
    <div class="container justify-content-center text-center">
        <h1>Galerij {{$year}}</h1>

        <div class="row justify-content-center p-3">
            @if(count($albums) > 0)
                @foreach($albums as $album)
                    <div class="col-lg-4 ">
                        <div class="card mb-4 shadow-sm border-0">

                            @if(count($album->picture) > 0)
                                <a href="{{route('galerij_album',[$album->id, $year])}}">
                                    <img src="{{ asset('images/' . $album->picture[0]->image) }}" dusk="AlbumTest" class="card-img-top" alt="Knop album {{$album->title}}">
                                </a>
                            @else
                                <a type="button">
                                    <img src="/img/dummy_500x375_ffffff_cccccc_voeg-fotos-toe.png" class="card-img-top" alt="Knop album {{$album->title}}">
                                </a>
                            @endif

                            <div class="card-body">
                                <div class="card-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="h5 card-title">
                                            {{$album->title}}
                                        </p>
                                        <p class="card-subtitle">
                                            {{$album->date}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@stop
