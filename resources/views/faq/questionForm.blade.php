@extends('layouts.layout')
 
@section('content')
    <h1>Stel een vraag</h1>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="POST" action="/vragenantwoorden/submit">
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
            <label for="email" class="col-sm-2 col-form-label">
                <span class="requiredStar">*</span>Email adres
            </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" placeholder="bv: jandegraaf@gmail.com" name="email"  value="{{old('email')}}">
                <div class="form-text">Het antwoord op uw vraag zal u ontvangen op dit e-mail adres.</div>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="question" class="col-sm-2 col-form-label">
                <span class="requiredStar">*</span>Vraag
            </label>
            <div class="col-sm-8">
                <textarea type="text" class="form-control" id="question" placeholder="Vul hier uw vraag in" 
                    name="question">{{old('question')}}</textarea>
            </div>
            @error('question')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" id="verstuurknop" name="verstuurknop" class=" btn btn-primary">Verstuur vraag
        </button>
    </form>
@stop