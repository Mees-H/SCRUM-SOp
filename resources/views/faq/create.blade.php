@extends('layouts.layout')

@section('content')
<h1 class="display-3">Veelgestelde vragen toevoegen</h1>
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
                <span class="requiredStar">*</span><label for="vraag">Vraag:</label>
                <input type="text" class="form-control @error('vraag') is-invalid @enderror" name="vraag" id="vraag" required autofocus/>
            </div>
            <div class="form-group">
                <span class="requiredStar">*</span><label for="antwoord">Antwoord:</label>
                <input type="text" class="form-control @error('antwoord') is-invalid @enderror" name="antwoord" id="antwoord" required/>
            </div>
            <button type="submit" class="btn btn-primary">Voeg veelgestelde vraag toe</button>
        </form>
    </div>
@endsection