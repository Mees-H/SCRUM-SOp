@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg link toe</h1>
        <a href="/links" class="btn btn-primary">Ga terug</a>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('links.store') }}">
                @csrf
                <div class="form-group">
                    <label for="categorie">Categorie:</label>
                    <input type="text" class="form-control" name="categorie" id="categorie"/>
                </div>

                <div class="form-group">
                    <label for="functie">Functie:</label>
                    <input type="text" class="form-control" name="functie" id="functie"/>
                </div>

                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" class="form-control" name="naam" id="naam"/>
                </div>

                <div class="form-group">
                    <label for="verwijzing">Verwijzing:</label>
                    <input type="text" class="form-control" name="verwijzing" id="verwijzing"/>
                </div>

                <button type="submit" class="btn btn-primary">Voeg link toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
