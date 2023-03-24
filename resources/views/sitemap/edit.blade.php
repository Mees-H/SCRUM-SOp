@extends('layouts.layout')
 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Link aanpassen
        <a href="/links" class="btn btn-primary">Ga terug</a></h1>
 
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
        <form method="post" action="{{ route('links.update', $sitemap->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
                <label for="categorie">Categorie:</label>
                <input type="text" class="form-control" name="categorie" value="{{ $sitemap->categorie}}" id="categorie"/>
            </div>
    
            <div class="form-group">
                <label for="functie">Functie:</label>
                <input type="text" class="form-control" name="functie" value="{{ $sitemap->functie}}" id="functie"/>
            </div>
    
            <div class="form-group">
                <label for="naam">Naam:</label>
                <input type="text" class="form-control" name="naam" value="{{ $sitemap->naam}}" id="naam"/>
            </div>
    
            <div class="form-group">
                <label for="verwijzing">Verwijzing:</label>
                <input type="text" class="form-control" name="verwijzing" value="{{ $sitemap->verwijzing}}" id="verwijzing"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection