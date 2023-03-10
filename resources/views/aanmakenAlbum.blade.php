@extends('layouts.layout')

@section('content')
    <div class="container">
   <h1>Album toevoegen</h1>
    <form>
        <div class="form-group">
            <label for="titel">Album titel</label>
            <input type="text" class="form-control" id="titel">
        </div>
        <div class="form-group">
            <label for="date">Datum gemaakte foto's</label>
            <input type="date" class="form-control" id="date" placeholder="Datum">
        </div>
        <button type="submit" class="btn btn-primary">Album toevoegen</button>
    </form>
    </div>
@stop
