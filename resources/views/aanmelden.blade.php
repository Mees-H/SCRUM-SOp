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
            <x-requiredStar>@section('tag')<label for="name">Voor- en achternaam</label>@stop</x-requiredStar>
            <input type="text" class="form-control" id="name" placeholder="bv: Jan de Graaf" name="name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <x-requiredStar>@section('tag')<label for="birthday">Geboortedatum</label>@stop</x-requiredStar>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}">
            @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <x-requiredStar>@section('tag')<label for="email">Email adres</label>@stop</x-requiredStar>
            <input type="email" class="form-control" id="email" placeholder="bv: jandegraaf@gmail.com" name="email"  value="{{old('email')}}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <x-requiredStar>@section('tag')<label for="phonenumber">Telefoonnummer</label>@stop</x-requiredStar>
            <input type="tel" class="form-control" id="phonenumber" placeholder="bv: 0612345678" name="phonenumber"  value="{{old('phonenumber')}}">
            @error('phonenumber')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <x-requiredStar>@section('tag')<label for="address">Adres</label>@stop</x-requiredStar>
            <input type="text" class="form-control" id="address" placeholder="bv: Bakkerweg 12" name="address"  value="{{old('address')}}">
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <x-requiredStar>@section('tag')<label for="city">Woonplaats</label>@stop</x-requiredStar>
            <input type="text" class="form-control" id="city" placeholder="bv: 's Hertogenbosch" name="city"  value="{{old('city')}}">
            @error('city')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <x-requiredStar>@section('tag')<label for="disability">Beperking</label>@stop</x-requiredStar>
            <input type="text" class="form-control" id="disability"
                   placeholder="Vul hier uw verstandelijke beperking(en) in" name="disability"  value="{{old('disability')}}">
            @error('disability')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="hidden" value="{{old('eventId')}}" name="event_id" id="event_id" >

        <button type="submit" id="aanmeldknop" name="aanmeldknop" class=" btn btn-primary">Verzend inschrijving
        </button>
    </form>

@stop
