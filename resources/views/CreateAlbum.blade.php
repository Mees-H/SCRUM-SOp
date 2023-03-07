@extends('layouts.layout')

@section('content')
    <div class="container">
   <h2>Album toevoegen</h2>
    <form>
        <div class="form-group">
            <label for="albumName">Albumnaam</label>
            <input type="text" class="form-control" id="albumName" placeholder="Albumnaam">
        </div>
        <div class="form-group">
            <label for="albumDescription">Albumbeschrijving</label>
            <input type="text" class="form-control" id="albumDescription" placeholder="Albumbeschrijving">
        </div>
        <div class="form-group">
            <label for="albumDate">Datum</label>
            <input type="date" class="form-control" id="albumDate" placeholder="Datum">
        </div>
        <div class="form-group">
            <label for="albumLocation">Locatie</label>
            <input type="text" class="form-control" id="albumLocation" placeholder="Locatie">
        </div>
        <div class="form-group">
            <label for="albumImage">Afbeelding</label>
            <input type="file" class="form-control-file" id="albumImage" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Kies een afbeelding voor het album.</small>
        </div>
        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
    </div>
@stop
