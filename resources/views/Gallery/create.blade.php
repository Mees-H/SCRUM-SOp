@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Album toevoegen</h1>
        <a href="/galerij" class="btn btn-primary">Ga terug</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
        <form action="{{route('galerij.store')}}" type="submit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Album titel</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="description">Omschrijving van de album</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Omschrijving">
            </div>
            <div class="form-group">
                <label for="date">Datum gemaakte foto's</label>
                <input type="date" name="date" class="form-control" id="date" placeholder="Datum">
            </div>
            <button type="submit" class="btn btn-primary">Album toevoegen</button>
        </form>
    </div>
</div>

@stop