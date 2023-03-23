@extends('layouts.layout') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Lid aanpassen
        <a href="/members" class="btn btn-primary">Ga terug</a></h1>
 
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
        <form method="post" action="{{ route('members.update', $member->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
                <label for="name">Naam:</label>
                *<input type="text" class="form-control" name="name" value="{{$member->name}}"/>
                <input type="checkbox" class="form-check-input" name="activated[]" value="name"/>
            </div>
    
            <div class="form-group">
                <label for="email">E-mail:</label>
                *<input type="email" class="form-control" name="email" id="email" value="{{$member->email}}"/>
                <input type="checkbox" class="form-check-input" name="activated[]" value="email"/>
            </div>
    
            <div class="form-group">
                <label for="phonenumber">Telefoonnummer:</label>
                <input type="tel" class="form-control" name="phonenumber" id="phonenumber" value="{{$member->phonenumber}}"/>
                <input type="checkbox" class="form-check-input" name="activated[]" value="phonenumber"/>
            </div>
    
            <div class="form-group">
                <label for="function">Functie:</label>
                <input type="text" class="form-control" name="function" id="function" value="{{$member->function}}"/>
                <input type="checkbox" class="form-check-input" name="activated[]" value="function"/>
            </div>
            
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" name="website" id="website" value="{{$member->website}}"/>
                <input type="checkbox" class="form-check-input" name="activated[]" value="website"/>
            </div>
            
            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" class="form-control" name="image" id="image" value="{{$member->imgurl}}"/>
                <input type="checkbox" class="form-check-input" name="activated[]" value="image"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection