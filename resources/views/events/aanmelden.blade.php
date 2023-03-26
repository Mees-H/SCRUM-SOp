@extends('layouts.layout')

@section('content')
    <h1>Inschrijven voor Evenement</h1>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="align-items-center">
        <form method="POST" action="/events/submit/{{$eventId}}" class="">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Voor- en achternaam
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" placeholder="bv: Jan de Graaf" name="name" value="{{old('name')}}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="birthday" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Geboortedatum
                </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}">
                </div>
                @error('birthday')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Email adres
                </label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="bv: jandegraaf@gmail.com" name="email"  value="{{old('email')}}">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="phonenumber" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Telefoonnummer
                </label>
                <div class="col-sm-8">
                    <input type="tel" class="form-control" id="phonenumber" placeholder="bv: 0612345678" name="phonenumber"  value="{{old('phonenumber')}}">
                </div>
                @error('phonenumber')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Adres
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" placeholder="bv: Bakkerweg 12" name="address"  value="{{old('address')}}">
                </div>
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="city" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Woonplaats
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="city" placeholder="bv: 's Hertogenbosch" name="city"  value="{{old('city')}}">
                </div>
                @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="disability" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Beperking
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="disability"
                    placeholder="Vul hier uw verstandelijke beperking(en) in" name="disability"  value="{{old('disability')}}">
                </div>
                @error('disability')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" value="{{old('eventId',$eventId)}}" name="event_id" id="event_id" >

            <button type="submit" id="aanmeldknop" name="aanmeldknop" class=" btn btn-primary">Verzend inschrijving
            </button>
        </form>
    </div>

@stop
