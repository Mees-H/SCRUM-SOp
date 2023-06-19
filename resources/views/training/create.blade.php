@extends('layouts.layout')
 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg training toe</h1>
        <a href="/trainingsessions" class="btn btn-primary" autofocus>Ga terug</a>
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
                    <span class="requiredStar">*</span><label for="date">Datum:</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="dd-mm-yyyy" required/>
                </div><br>
        
                <div class="form-group">
                    <span class="requiredStar">*</span><label for="starttime">Begintijd:</label>
                    <input type="time" class="form-control @error('time') is-invalid @enderror" name="starttime" id="starttime" required/>
                </div><br>
                
                <div class="form-group">
                    <span class="requiredStar">*</span><label for="endtime">Eindtijd:</label>
                    <input type="time" class="form-control @error('time') is-invalid @enderror" name="endtime" id="endtime" required/>
                </div><br>
        
                <div class="form-group">
                    <span class="requiredStar">*</span><label for="body">Beschrijving:</label>
                    <textarea rows="5" class="form-control @error('body') is-invalid @enderror" name="body" id="body" required></textarea>
                </div><br>
                
                <span class="requiredStar">*</span><label class="form-check-label">Trainingsgroep:</label>
                @foreach($groups as $group)
                <div class="form-check">
                    <input type="radio" class="form-check-input @error('radio') is-invalid @enderror" value="{{$group->GroupNumber}}" name="group" id="{{$group->Name}}"/>
                    <label for="{{$group->Name}}" class="form-check-label">{{$group->Name}}</label>
                </div>
                @endforeach
                <br>
                
                <label class="form-check-label" for="vacationweek">Vakantieweek:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('vacationweek') is-invalid @enderror" name="vacationweek" id="vacationweek" value="true"/>
                    <label for="vacationweek">Ja</label>
                </div><br>
                
                <button type="submit" class="btn btn-primary">Voeg training toe</button>
            </form>
        </div>
    </div>
</div>
@endsection