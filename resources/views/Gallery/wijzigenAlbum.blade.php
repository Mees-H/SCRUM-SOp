@extends('layouts.layout')

@section('content')
<head>
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center font-weight-bold">{{ $album->title }}</h1>
            <input type="hidden" name="id" value="{{ $album->id }}">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12 d-flex align-items-center h-100">
                        <textarea id='textarea' form='updateDescription' name="description" class="form-control" rows="5">{{ $album->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <p class="bg-lightgrey border border-dark rounded p-1 d-inline-block">{{ $album->date }}</p>
                </div>
            </div>

        <div class="row mt-3 text-center">
            <div class="col-md-4">
                <form action="{{ route('galerij_wijzigbeschrijving', $album->id) }}" method="POST" id="updateDescription">
                    @csrf
                    <input type="hidden" name="id" value="{{ $album->id }}">
                    <button type="submit" class="btn btn-primary wide-button text-white">Beschrijving aanpassen</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('galerij_verwijderfotos', $album->id) }}" method="POST" id="deleteForm">
                    @csrf
                    <button type="submit" class="btn btn-danger wide-button text-white">Foto's verwijderen</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ url('/galerij/'.$year.'/'.$album->title.'/voegfototoe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="album_id" value="{{ $album->id }}">
                    <button type="submit" class="btn btn-primary wide-button text-white">Foto toevoegen</button>
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
                        <img src="{{ asset($picture->imageUrl) }}" alt="{{ $picture->id }}" class="img-fluid w-100 h-100">
                        <input type='hidden' name='images[]' form='deleteForm' value='{{ $picture->id }}' disabled/>
                        <button onclick="selectPicture(this)" class='delete-button'></button>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div>
    <script src="{{ asset('js/album.js') }}"></script>
</body>

@stop
