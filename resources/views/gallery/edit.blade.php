@extends('layouts.layout')

@section('content')
<head>
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Album aanpassen
                <a href="/galerij" class="btn btn-primary">Ga terug</a></h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br />
                @endif
                <form method="post" id="updateAlbum" action="{{ route('galerij.update', $album->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">

                        <span class="requiredStar">*</span><label for="title">Titel:</label>
                        <input type="text" class="form-control" name="title" value="{{ $album->title }}" id="title"/>
                    </div>

                    <div class="form-group">
                        <span class="requiredStar">*</span><label for="description">Omschrijving:</label>
                        <textarea rows="5" class="form-control" name="description" id="description">{{ $album->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <span class="requiredStar">*</span><label for="date">Datum:</label>
                        <input type="date" class="form-control" name="date" value="{{ $album->date }}" id="date"/>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3 text-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            @if ($pictures->isEmpty())
            <p>Geen foto's gevonden in fotoalbum.</p>
            @else
                @foreach ($pictures as $picture)
                    <div class="col-md-4 mb-3">
                        <div class="image-container">
                            <img src="{{ asset('images/' . $picture->image) }}" alt="Afbeelding {{$picture->id}} uit {{$album->title}}" class="img-fluid w-100 h-100">
                            <input type='hidden' name='images[]' form='deleteForm' value='{{ $picture->id }}' disabled/>
                            <button onclick="selectPicture(this)" class='delete-button'></button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row mt-3 text-center mb-5">
            <div class="col-md-4">
                <form action="{{ url('/galerij/'.$year.'/'.$album->title.'/verwijderfotos') }}" method="POST" id="deleteForm">
                    @csrf
                    <button type="submit" class="btn btn-danger wide-button">Foto's verwijderen</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ url('/galerij/' . $album->id . '/addPhoto') }}" method="GET">
                    @csrf
                    <input type="hidden" name="album_id" value="{{ $album->id }}">
                    <button type="submit" class="btn btn-primary wide-button">Foto's toevoegen</button>
                </form>
            </div>
            <div class="col-md-4">
                <button type="submit" form="updateAlbum" class="btn btn-primary wide-button">Update</button>
            </div>

        </div>

    </div>
    <script src="{{ asset('js/album.js') }}"></script>
</body>

@stop
