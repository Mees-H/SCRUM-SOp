@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg evenement toe</h1>
        <a href="/events" class="btn btn-primary" autofocus>Ga terug</a>
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
                <span class="requiredStar">*</span><label for="title">Titel:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" required/>
                </div>

                <div class="form-group">
                <span class="requiredStar">*</span><label for="date">Datum:</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="dd-mm-yyyy" value="{{old('date')}}" required/>
                </div>

                <div class="form-group">
                    <label for="time">Tijd:</label>
                    <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" id="time" value="{{old('time')}}"/>
                </div>

                <div class="form-group">
                    <label for="price">Prijs:</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{old('price')}}"/>
                </div>

                <div class="form-group">
                    <label for="bankaccount">Rekeningnummer:</label>
                    <input type="text" class="form-control @error('bankaccount') is-invalid @enderror" name="bankaccount" id="bankaccount" value="{{old('bankaccount')}}"/>
                </div>

                <div class="form-group">
                <span class="requiredStar">*</span><label for="body">Beschrijving:</label>
                    <textarea required rows="5" class="form-control @error('body') is-invalid @enderror" name="body" id="body">{{old('body')}}</textarea>
                </div>

                <label>Groepen:*</label>
                @foreach($groups as $group)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @error('groups[]') is-invalid @enderror" name="groups[]" value="{{$group->id}}" id="{{$group->id}}"
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
