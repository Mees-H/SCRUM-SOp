@extends('layouts.layout')

@section('content')
    <div class="container justify-content-center text-center">
        <h1>Gallerij</h1>
        <div class="row justify-content-center p-3">
             @foreach($albums as $album)
                 <div class="col-md-4">
                     <div class="card">
                        <div class="card-header">
                            <h2>
                            {{$album->title}}
                            </h2>
                        </div>
                         <div class="card-body">
                        {{--     <a href="{{url("galerij/$album->id")}}">--}}
                                 {{--<img src="{{asset("storage/$album->coverImage")}}" class="img-fluid" alt="Afbeelding {{$album->title}}">--}}
                            {{-- </a>--}}
                         </div>
                         <div class="card-footer">
                             {{$album->date}}
                        </div>
                     </div>
                </div>
             @endforeach
        </div>

        <button class="btn btn-secondary" type="button" onclick="window.location='{{url("galerij/aanmakenAlbum")}}'">Maak album aan</button>
    </div>
@stop

