@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Persoon toevoegen</h1>
        <a href="/traininggroups" class="btn btn-primary" autofocus>Ga terug</a>
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
            <form method="post" action="/traininggroups/participants">
                @csrf
                <div class="form-group">
                    <label for="name">*Naam:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}"/>
                </div>

                <label>*Groepen:</label>
                @foreach($groups as $group)
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="group" value="{{$group->id}}" id="{{$group->id}}" {{ old('group') == $group->id ? 'checked' : ''}}/>
                    <label for="{{$group->id}}" class="form-check-label">{{$group->Name}}</label>
                </div>
                @endforeach
                <br>

                <button type="submit" class="btn btn-primary">Voeg persoon toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
