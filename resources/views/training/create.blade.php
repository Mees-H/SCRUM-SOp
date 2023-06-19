@extends('layouts.layout')
 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg training toe</h1>
        <a href="/trainingsessions" class="btn btn-primary">Ga terug</a>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br>
            @endif
            <br>
            <form method="post" action="{{ route('trainingsessions.store') }}">
                @csrf
                <div class="form-group">
                    <label for="date">Datum:</label>
                    <input type="date" class="form-control" name="date" id="date" placeholder="dd-mm-yyyy" value="{{ old('date') }}"/>
                </div><br>
        
                <div class="form-group">
                    <label for="starttime">Begintijd:</label>
                    <input type="time" class="form-control" name="starttime" id="starttime" value="{{ old('starttime') }}"/>
                </div><br>
                
                <div class="form-group">
                    <label for="endtime">Eindtijd:</label>
                    <input type="time" class="form-control" name="endtime" id="endtime" value="{{ old('endtime') }}"/>
                </div><br>
        
                <div class="form-group">
                    <label for="body">Beschrijving:</label>
                    <textarea rows="5" class="form-control" name="body" id="body">{{ old('body') }}</textarea>
                </div><br>
                
                <label class="form-check-label">Trainingsgroep:</label>
                @foreach($groups as $group)
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="group" id="{{$group->Name}}"
                            value="{{$group->id}}"
                            @if(old('group') == $group->GroupNumber) checked @endif />
                        <label for="{{$group->Name}}" class="form-check-label">{{$group->Name}}</label>
                    </div>
                @endforeach
                <br>
                
                <label class="form-check-label" for="vacationweek">Vakantieweek:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="vacationweek" id="vacationweek" value="true"
                        @if(old('vacationweek')) checked @endif />
                    <label for="vacationweek">Ja</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Voeg training toe</button>
            </form>
        </div>
    </div>
</div>
@endsection