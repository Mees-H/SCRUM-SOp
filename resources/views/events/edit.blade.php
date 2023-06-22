@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Evenement aanpassen
        <a href="/events" class="btn btn-primary" autofocus>Ga terug</a></h1>

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
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $event->title }}" id="title" required/>
            </div>

            <div class="form-group">
                <span class="requiredStar">*</span><label for="date">Datum:</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="dd-mm-yyyy" value="{{ $event->date }}" id="date" required/>
            </div>

            <div class="form-group">
                <label for="time">Tijd:</label>
                <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $event->time }}" id="time"/>
            </div>

            <div class="form-group">
                <label for="price">Prijs:</label>
                <input type="number" min="0" step="0.01" lang="nl" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $event->price }}" id="price"/>
            </div>

            <div class="form-group">
                    <label for="bankaccount">Rekeningnummer:</label>
                    <input type="text" class="form-control @error('bankaccount') is-invalid @enderror" name="bankaccount" value="{{ $event->bankaccount }}" id="bankaccount"/>
                </div>

            <div class="form-group">
                <span class="requiredStar">*</span><label for="body">Beschrijving:</label>
                <textarea rows="5" class="form-control @error('body') is-invalid @enderror" name="body" id="body" required>{{ $event->body }}</textarea>
            </div>

            <label>Groepen:</label>
                @foreach($groups as $group)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('groups[]') is-invalid @enderror" name="groups[]" value="{{$group->id}}" id="{{$group->id}}"
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
