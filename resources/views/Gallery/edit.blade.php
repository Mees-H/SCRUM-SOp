@extends('layouts.layout')

@section('content')
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
        <form method="post" action="{{ route('galerij.update', $album->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
 
                <label for="title">Titel:</label>
                <input type="text" class="form-control" name="title" value="{{ $album->title }}" id="title"/>
            </div>
 
            <div class="form-group">
                <label for="description">Omschrijving:</label>
                <textarea rows="5" class="form-control" name="description" id="description">{{ $album->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" class="form-control" name="date" value="{{ $album->date }}" id="date"/>
            </div>
 
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection