@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Groep toevoegen</h1>
        <a href="/traininggroups" class="btn btn-primary">Ga terug</a>
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
            <form method="post" action="/traininggroups">
                @csrf
                <div class="form-group">
                    <label for="name">Naam:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
            
                <label>Groepen:</label>
                @if($participants->count() == 0)
                <p>Alle leden zijn al aan groepen toegewezen</p>
                @else
                @foreach($participants as $participant)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="participants[]" value="{{$participant->Id}}" id="{{$participant->Id}}"/>
                    <label for="{{$participant->Id}}" class="form-check-label">{{$participant->Name}}</label>
                </div>
                @endforeach
                <br>
                @endif

                <button type="submit" class="btn btn-primary">Voeg groep toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
