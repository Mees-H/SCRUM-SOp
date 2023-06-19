@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Inschrijven voor Evenement</h1>

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <br/>

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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="bv: Jan de Graaf" name="name"
                                   value="{{old('name')}}" required>
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
                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" placeholder="dd-mm-yyyy"
                                   value="{{old('birthday')}}" required>
                        </div>
                        @error('birthday')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="golfhandicap" class="col-sm-2 col-form-label">
                            Golfhandicap
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('golfhandicap') is-invalid @enderror" id="golfhandicap"
                            placeholder="Vul hier uw golfhandicap(s) in" name="golfhandicap" value="{{old('golfhandicap')}}">
                        </div>
                        @error('golfhandicap')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="gender" class="col-sm-2 col-form-label">
                            <span class="requiredStar">*</span>Gender
                        </label>
                        <div class="col-sm-8">
                            <div>
                                <label>
                                    <input class="@error('gender') is-invalid @enderror" id="GenderMan" type="radio" name="gender" value="Man"
                                           @if(old('gender')==='Man') checked="checked" @endif>
                                    Man
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input class="@error('gender') is-invalid @enderror" id="GenderVrouw" type="radio" name="gender" value="Vrouw"
                                           @if(old('gender')==='Vrouw') checked="checked" @endif>
                                    Vrouw
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input class="@error('gender') is-invalid @enderror" id="GenderAnders" type="radio" name="gender" value="Anders"
                                           @if(old('gender')==='Anders') checked="checked" @endif>
                                    Anders
                                </label>
                            </div>
                        </div>
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <br/>

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
                            <input type="email" class="form-control" id="email" placeholder="bv: jandegraaf@gmail.com"
                                   name="email" value="{{old('email')}}" required>
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
                            <input type="tel" class="form-control" id="phonenumber" placeholder="bv: 0612345678"
                                   name="phonenumber" value="{{old('phonenumber')}}" required>
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
                            <input type="text" class="form-control" id="address" placeholder="bv: Bakkerweg 12"
                                   name="address" value="{{old('address')}}" required>
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
                            <input type="text" class="form-control" id="city" placeholder="bv: 's Hertogenbosch"
                                   name="city" value="{{old('city')}}" required>
                        </div>
                        @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <br/>

            <input type="hidden" value="{{old('eventId',$eventId)}}" name="event_id" id="event_id">

            <button type="submit" id="aanmeldknop" name="aanmeldknop" class=" btn btn-primary">Verzend inschrijving
            </button>
        </form>
    </div>

@stop
