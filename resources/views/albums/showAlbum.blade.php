@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('/css/Album.css')}}">
        <title>Show Album</title>
    </head>
    <body>
        <div class="col d-flex justify-content-end">
            <button class="btn btn-outline-secondary mt-4 text-right" name="Terugknop naar galerij" onclick="window.location='{{url("/albums/{$year}")}}'">Terug</button>
        </div>
            <div class="col text-center">

            <h1>{{ \Carbon\Carbon::parse($album->date)->format('d-m-Y')}} | {{$album->title}}</h1>
            <article>
                {{$album->description}}
            </article>
            </div>
            <div class="album py-5 container">
            <div class="row">
                @foreach($pictures as $picture)
                @if(count($pictures) == 1)
                    <div class="col">
                        <div class="card mb-5 shadow-sm col">
                            <img type="button" class="card-img-top" src="{{ asset('img/' . $picture->image) }}" dusk="PictureTest" alt="Afbeelding {{$picture->id}} uit album {{$album->title}}">
                        </div>
                    </div>
                @elseif(count($pictures) == 2)
                    <div class="col-md-6">
                        <div class="card mb-5 shadow-sm col">
                            <img type="button" class="card-img-top" src="{{ asset('img/' . $picture->image) }}" dusk="PictureTest" alt="Afbeelding {{$picture->id}} uit album {{$album->title}}">
                        </div>
                    </div>
                @elseif(count($pictures) == 3)
                    <div class="col-md-4">
                        <div class="card mb-5 shadow-sm col">
                            <img type="button" class="card-img-top" src="{{ asset('img/' . $picture->image) }}" dusk="PictureTest" alt="Afbeelding {{$picture->id}} uit album {{$album->title}}">
                        </div>
                    </div>
                @else
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm col">
                            <img type="button" class="card-img-top" src="{{ asset('img/' . $picture->image) }}" dusk="PictureTest" alt="Afbeelding {{$picture->id}} uit album {{$album->title}}">
                        </div>
                    </div>
                @endif
                    
                @endforeach
            </div>
            </div>

    </body>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-body">

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.card-img-top').click(function(){
                let src = $(this).attr('src');
                $('.modal-body').empty().append("<img src='"+src+"' class='modal-img' alt='De geklikte foto'>");
                $('#imageModal').modal('show');
            });
        });
    </script>
@stop
