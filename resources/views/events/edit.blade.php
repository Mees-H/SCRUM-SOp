@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Evenement aanpassen
        <a href="/events" class="btn btn-primary">Ga terug</a></h1>

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
        <form method="post" action="{{ route('events.update', $event->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <span class="requiredStar">*</span><label for="title">Titel:</label>
                <input type="text" class="form-control" name="title" value="{{ $event->title }}" id="title" required/>
            </div>

            <div class="form-group">
                <span class="requiredStar">*</span><label for="date">Datum:</label>
                <input type="date" class="form-control" name="date" placeholder="dd-mm-yyyy" value="{{ $event->date }}" id="date" required/>
            </div>

            <div class="form-group">
                <label for="time">Tijd:</label>
                <input type="time" class="form-control" name="time" value="{{ $event->time }}" id="time"/>
            </div>

            <div class="form-group">
                <label for="price">Prijs:</label>
                <input type="number" min="0" step="0.01" lang="nl" class="form-control" name="price" value="{{ $event->price }}" id="price"/>
            </div>

            <div class="form-group">
                    <label for="bankaccount">Rekeningnummer:</label>
                    <input type="text" class="form-control" name="bankaccount" value="{{ $event->bankaccount }}" id="bankaccount"/>
                </div>

            <div class="form-group">
                <span class="requiredStar">*</span><label for="body">Beschrijving:</label>
                <textarea rows="5" class="form-control" name="body" id="body" required>{{ $event->body }}</textarea>
            </div>

            <label>Groepen:</label>
                @foreach($groups as $group)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="groups[]" value="{{$group->id}}" id="{{$group->id}}"
                        {{in_array($group->id, $event->groups()->allRelatedIds()->toArray())? 'checked':''}}
                    />
                    <label for="{{$group->id}}" class="form-check-label">{{$group->name}}</label>
                </div>
                @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
