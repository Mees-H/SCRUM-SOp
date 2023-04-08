@extends('layouts.layout')

@section('content')
    <h1>Afmelden voor training</h1>

    <div class="align-items-center">
        <form method="POST" action="signout">
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
                <label for="date" class="col-sm-2 col-form-label">
                    <span class="requiredStar">*</span>Datum
                </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}">
                </div>
                @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" id="afmeldknop" name="afmeldknop" class="btn btn-primary">Afmelden
            </button>
        </form>
    </div>

@stop
