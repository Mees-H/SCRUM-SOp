@extends('layouts.layout')

@section('content')
    <div class="container">
        @if(session()->get('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif
        <div class="row">
            <div class="col-md-12 text-center image-form">
                <x-album-upload-form action="{{ route('addAlbumPictures', ['year' => $year, 'title' => $title]) }}" label="Upload Afbeelding Voor Fotoalbum" :album-id="$album->id"/>            </div>
        </div>
    </div>
@endsection
