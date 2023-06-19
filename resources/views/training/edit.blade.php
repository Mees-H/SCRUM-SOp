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
        <form method="post" action="{{ route('trainingsessions.update', $session->Id) }}">
            @method('PATCH') 
            @csrf

            <div class="form-group">
                <span class="requiredStar">*</span><label for="date">Datum:</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="dd-mm-yyyy" value="{{$session->Date}}" required/>
            </div><br>
            
            <div class="form-group">
                <span class="requiredStar">*</span><label for="starttime">Begintijd:</label>
                <input type="time" class="form-control @error('starttime') is-invalid @enderror" name="starttime" value="{{ $session->StartTime }}" id="time" required/>
            </div><br>
            
            <div class="form-group">
                <span class="requiredStar">*</span><label for="endtime">Eindtijd:</label>
                <input type="time" class="form-control @error('endtime') is-invalid @enderror" name="endtime" value="{{ $session->EndTime }}" id="time" required/>
            </div><br>

            <div class="form-group">
                <span class="requiredStar">*</span><label for="body">Beschrijving:</label>
                <textarea rows="5" class="form-control" name="body" id="body" required>{{ $session->Description }}</textarea>
            </div><br>
                
            <span class="requiredStar">*</span><label class="form-check-label">Trainingsgroep:</label>
            @foreach($groups as $group)
            <div class="form-check">
                <input type="radio" class="form-check-input" value="{{$group->GroupNumber}}" name="group" id="{{$group->Name}}" {{$session->GroupNumber == $group->GroupNumber ? 'checked' : ''}}/>
                <label for="{{$group->Name}}" class="form-check-label">{{$group->Name}}</label>
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