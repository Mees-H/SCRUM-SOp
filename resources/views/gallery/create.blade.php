@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Album toevoegen</h1>
        <a href="/galerij" class="btn btn-primary" autofocus>Ga terug</a>
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
                <span class="requiredStar">*</span><label for="title">Album titel</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror autofocus" id="title" placeholder="Titel" required>
            </div>
            <div class="form-group">
                <span class="requiredStar">*</span><label for="description">Omschrijving van de album</label>
                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Omschrijving" required></textarea>
            </div>
            <div class="form-group">
                <span class="requiredStar">*</span><label for="date">Datum gemaakte foto's</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="dd-mm-yyyy" required>
            </div>
            <button type="submit" class="btn btn-primary">Album toevoegen</button>
        </form>
    </div>
</div>

@stop
