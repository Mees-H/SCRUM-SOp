@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('/css/Album.css')}}">
        <title>Galerij</title>
    </head>
    <div class="container justify-content-center text-center">
        <h1>Galerij {{$year}}</h1>

        {{--Deze Knoppen zijn voor een andere userstory. Jira: S8S-32 en 33, Staan tijdelijk op hidden --}}
        <div class="btn-group d-flex justify-content-end">
            <button class="btn btn-outline-success" onclick="window.location='{{url("galerij/aanmakenAlbum")}}'" disabled="disabled" hidden="hidden" name="album toevoegen">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                    <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                    <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </button>
            <button class="btn btn-outline-danger" name="verwijder album" disabled="disabled" hidden="hidden" onclick="window.location='{{url("galerij/verwijderenAlbum")}}'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-minus" viewBox="0 0 16 16">
                    <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                    <path d="M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 1 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
        </div>

        <div class="row justify-content-center p-3">
            @if(count($albums) > 0)
                @foreach($albums as $album)
                    <div class="col-lg-4 ">
                        <div class="card mb-4 shadow-sm border-0">

                            @if(count($album->picture) > 0)
                                <a href="{{route('galerij_album',[$year, $album->title])}}">
                                    <img src="{{$album->picture[0]->imageUrl}}" class="card-img-top" alt="Knop album {{$album->title}}">
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
            @else
                <p>Er zijn nog geen albums</p>
                <button type="button" class="btn btn-primary" onclick="window.location='{{url("galerij/aanmakenAlbum")}}'" name="album toevoegen">
                    Maak een album
                </button>
            @endif

        </div>

    </div>
@stop
