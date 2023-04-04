@extends('layouts.layout')

@section('content')
<h1 class="display-3">Voeg evenement toe</h1>
    <a href="/faq" class="btn btn-primary">Ga terug</a>
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
        <form method="post" action="{{ route('faq.store') }}">
            @csrf
            <div class="form-group">    
                <label for="vraag">Vraag:</label>
                <input type="text" class="form-control" name="vraag" id="vraag" required/>
            </div>
            <div class="form-group">
                <label for="antwoord">Antwoord:</label>
                <input type="text" class="form-control" name="antwoord" id="antwoord" required/>
            </div>
            <button type="submit" class="btn btn-primary">Voeg vraag & antwoord toe</button>
        </form>
    </div>
@endsection