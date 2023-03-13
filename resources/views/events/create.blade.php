@extends('layouts.layout')
 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg evenement toe</h1>
        <a href="/events" class="btn btn-primary">Ga terug</a>
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
            <form method="post" action="{{ route('events.store') }}">
                @csrf
                <div class="form-group">    
                    <label for="title">Titel:</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
        
                <div class="form-group">
                    <label for="date">Datum:</label>
                    <input type="date" class="form-control" name="date"/>
                </div>
        
                <div class="form-group">
                    <label for="time">Tijd:</label>
                    <input type="time" class="form-control" name="time"/>
                </div>
        
                <div class="form-group">
                    <label for="body">Tekst:</label>
                    <textarea rows="5" class="form-control" name="body"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="groups">Groepen:</label>
                    <input type="text" class="form-control" name="groups"/>
                </div>
                
                <button type="submit" class="btn btn-primary">Voeg evenement toe</button>
            </form>
        </div>
    </div>
</div>
@endsection