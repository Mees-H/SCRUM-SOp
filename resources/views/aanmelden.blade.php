@extends('layouts.layout')

@section('content')
    <h1>Inschrijven voor Evenement</h1>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="POST" action="/events/submit/{{$eventId}}">
        @csrf
        <div class="form-group">
            <label for="name">Voor- en achternaam</label>
            <input type="text" class="form-control" id="name" placeholder="bv: Jan de Graaf" name="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="birthday">Geboortedatum</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
            @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email adres</label>
            <input type="email" class="form-control" id="email" placeholder="bv: jandegraaf@gmail.com" name="email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phonenumber">Telefoonnummer</label>
            <input type="tel" class="form-control" id="phonenumber" placeholder="bv: 0612345678" name="phonenumber">
            @error('phonenumber')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Adres</label>
            <input type="text" class="form-control" id="address" placeholder="bv: Bakkerweg 12" name="address">
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="city">Woonplaats</label>
            <input type="text" class="form-control" id="city" placeholder="bv: 's Hertogenbosch" name="city">
            @error('city')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="disability">Beperking</label>
            <input type="text" class="form-control" id="disability"
                   placeholder="Vul hier uw verstandelijke beperking(en) in" name="disability">
            @error('disability')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="event_id">evenement nummer</label>--}}
{{--            <input type="text" class="form-control" id="event_id" placeholder="" name="event_id">--}}
{{--        </div>--}}
        <input type="hidden" value="{{$eventId}}" name="event_id" id="event_id">

        <button type="submit" id="aanmeldknop" name="aanmeldknop" class=" btn darkBlueBackground">Verzend inschrijving
        </button>
    </form>

@stop
