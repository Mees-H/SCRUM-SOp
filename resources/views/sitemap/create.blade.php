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
                    <label for="category">Categorie:</label>
                    <input type="text" class="form-control" name="category" id="category"/>
                </div>
        
                <div class="form-group">
                    <label for="function">Functie:</label>
                    <input type="text" class="form-control" name="function" id="function"/>
                </div>
        
                <div class="form-group">
                    <label for="name">Naam:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
        
                <div class="form-group">
                    <label for="link">Verwijzing:</label>
                    <input type="text" class="form-control" name="link" id="link"/>
                </div>
                
                <button type="submit" class="btn btn-primary">Voeg link toe</button>
            </form>
        </div>
    </div>
</div>
@endsection