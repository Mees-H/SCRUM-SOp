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
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}"/>
                </div>

                <div class="form-group">
                    <label for="date">Datum:</label>
                    <input type="date" class="form-control" name="date" id="date" placeholder="dd-mm-yyyy" value="{{old('date')}}"/>
                </div>

                <div class="form-group">
                    <label for="time">Tijd:</label>
                    <input type="time" class="form-control" name="time" id="time" value="{{old('time')}}"/>
                </div>

                <div class="form-group">
                    <label for="price">Prijs:</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{old('price')}}"/>
                </div>

                <div class="form-group">
                    <label for="bankaccount">Rekeningnummer:</label>
                    <input type="text" class="form-control" name="bankaccount" id="bankaccount" value="{{old('bankaccount')}}"/>
                </div>

                <div class="form-group">
                    <label for="body">Beschrijving:</label>
                    <textarea rows="5" class="form-control" name="body" id="body">{{old('body')}}</textarea>
                </div>

                <label>Groepen:</label>
                @foreach($groups as $group)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="groups[]" value="{{$group->id}}" id="{{$group->id}}"
                            @if(in_array($group->id, old('groups', []))) checked @endif />
                        <label for="{{$group->id}}" class="form-check-label">{{$group->name}}</label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Voeg evenement toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
