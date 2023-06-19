@extends('layouts.layout') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Evenement aanpassen
        <a href="/trainingsessions" class="btn btn-primary">Ga terug</a></h1>
 
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
        <form method="post" action="{{ route('trainingsessions.update', $session->id) }}">
            @method('PATCH') 
            @csrf

            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="dd-mm-yyyy" value="{{$session->Date}}"/>
            </div><br>
            
            <div class="form-group">
                <label for="starttime">Begintijd:</label>
                <input type="time" class="form-control" name="starttime" value="{{ $session->StartTime }}" id="time"/>
            </div><br>
            
            <div class="form-group">
                <label for="endtime">Eindtijd:</label>
                <input type="time" class="form-control" name="endtime" value="{{ $session->EndTime }}" id="time"/>
            </div><br>

            <div class="form-group">
                <label for="body">Beschrijving:</label>
                <textarea rows="5" class="form-control" name="body" id="body">{{ $session->Description }}</textarea>
            </div><br>
                
            <label class="form-check-label">Trainingsgroep:</label>
            @foreach($groups as $group)
            <div class="form-check">
                <input type="radio" class="form-check-input" value="{{$group->id}}" name="group" id="{{$group->id}}" {{$session->group_id == $group->id ? 'checked' : ''}}/>
                <label for="{{$group->id}}" class="form-check-label">{{$group->Name}}</label>
            </div>
            @endforeach
            <br>
            
            <label class="form-check-label" for="vacationweek">Vakantieweek:</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="vacationweek" value="true" {{$session->IstrainingSession == 0 ? 'checked' : ''}}/>
                <label for="vacationweek">Ja</label>
            </div><br>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection