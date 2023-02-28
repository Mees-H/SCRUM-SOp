@extends('layouts.layout')

@section('content')
<form>
  <div class="form-group">
    <label for="name">Naam</label>
    <input type="text" name="name" class="form-control" placeholder="Hoe wil je de training noemen?" required>
  </div>
  <div class="form-group">
    <label for="date">Datum</label>
    <input type="date" name="date" class="form-control" placeholder="Op welke datum is de training?" required>
  </div>
  <div class="form-group">
    <label for="start">Starttijd</label>
    <input type="time" name="start" class="form-control" placeholder="Hoelaat begint de training?" required>
  </div>
  <div class="form-group">
    <label for="end">Eindtijd</label>
    <input type="time" name="end" class="form-control" placeholder="Hoelaat eindigt de training?" required>
  </div>
  <div class="form-group">
    <label for="location">Locatie</label>
    <input type="text" name="location" class="form-control" placeholder="Waar vindt de training plaats?" required>
  </div>
  <div class="form-group">
    <label for="trainers">Trainers</label>
    <input type="text" name="trainers" class="form-control" placeholder="Welke trainers geven deze training?" required>
  </div>
  <button type="submit" class="btn btn-gradient=primary me-2">Training toevoegen</button>
</form>
@stop