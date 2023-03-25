@extends('layouts.layout')
 
@section('content')
    <h1>Stel een vraag</h1>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="POST" action="/faq/submit">
        @csrf
        <div class="form-group">
            <div class="row"><label for="name">Voor- en achternaam</label></div>
            <input type="text" class="form-control" id="name" placeholder="bv: Jan de Graaf" name="name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="row"><label for="email">Email adres</label></div>
            <input type="email" class="form-control" id="email" placeholder="bv: jandegraaf@gmail.com" name="email"  value="{{old('email')}}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="row"><label for="question">Vraag</label></div>
            <textarea type="text" class="form-control" id="question" placeholder="Vul hier uw vraag in" 
                name="question">{{old('question')}}</textarea>
            @error('question')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" id="verstuurknop" name="verstuurknop" class=" btn btn-primary">Verstuur vraag
        </button>
    </form>
@stop