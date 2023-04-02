@extends('layouts.layout')

@section('content')
<h1 class="display-3">FAQ aanpassen
    <a href="/faq" class="btn btn-primary">Ga terug</a></h1>

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
    <form method="POST" action="{{ route('faq.update', $FAQ->id) }}">
        @method('PATCH') 
        @csrf
        <div class="form-group">
            <label for="vraag">Vraag:</label>
            <input type="text" class="form-control" name="vraag" value="{{ $FAQ->question }}" id="vraag" required/>
        </div>

        <div class="form-group">
            <label for="antwoord">Antwoord:</label>
            <input type="text" class="form-control" name="antwoord" value="{{ $FAQ->answer }}" id="antwoord" required/>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection