@extends('layouts.layout')

@section('content')
    <div class="container justify-content-center text-center">
        <h1>Gallerij</h1>
        <div class="row justify-content-center">
             @foreach($albums as $album)
                 <div class="col-md-4">
                     {{$album->id}}
                 </div>
                <div>
                    {{$album->titel}}
                </div>
             @endforeach
        </div>

        <button class="btn btn-secondary" type="button" onclick="window.location='{{url("galerij/aanmakenAlbum")}}'">Maak album aan</button>
    </div>
@stop

