@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Inschrijven voor Evenement</h1>

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <br />

        <form method="POST" action="/events/submit/{{$eventId}}" class="">
            @csrf
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Persoonlijke gegevens') }}
                    </h2>
                    <div>
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
                    <div>
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
                    <div>
                        <label for="gender" class="col-sm-2 col-form-label">
                            <span class="requiredStar">*</span>Geslacht
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="gender"
                                   placeholder="Vul hier uw geslacht in" name="gender"  value="{{old('gender')}}">
                        </div>
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
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
                </div>
            </div>

            <br />

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Contactgegevens') }}
                    </h2>
                    <div>
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
                    <div>
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
                    <div>
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
                    <div>
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
                </div>
            </div>

            <br />

            <input type="hidden" value="{{old('eventId',$eventId)}}" name="event_id" id="event_id" >

            <button type="submit" id="aanmeldknop" name="aanmeldknop" class=" btn btn-primary">Verzend inschrijving
            </button>
        </form>
    </div>

@stop
