@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center image-form">
                <x-image-upload-form action="{{ route('addAlbumPictures', ['year' => $year, 'title' => $title]) }}" label="Upload Afbeelding Voor Fotoalbum" :album-id="$album->id"/>            </div>
        </div>
    </div>
@endsection
