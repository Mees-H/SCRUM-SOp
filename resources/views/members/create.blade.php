@extends('layouts.layout')
 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg lid toe</h1>
        <a href="/members" class="btn btn-primary">Ga terug</a>
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
            <form method="post" action="{{ route('members.store') }}" files="true">
                @csrf
                <div class="form-group">    
                    <label for="name">Naam:</label>
                    *<input type="text" class="form-control" name="name" id="name"/>
                </div>
        
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    *<input type="email" class="form-control" name="email" id="email"/>
                </div>
        
                <div class="form-group">
                    <label for="phonenumber">Telefoonnummer:</label>
                    <input type="tel" class="form-control" name="phonenumber" id="phonenumber"/>
                </div>
        
                <div class="form-group">
                    <label for="function">Functie:</label>
                    <input type="text" class="form-control" name="function" id="function"/>
                </div>
                
                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" class="form-control" name="website" id="website"/>
                </div>
                
                <div class="form-group">
                    <label for="image">Foto:</label>
                    <input type="file" class="form-control" name="image" id="image"/>
                </div>
                
                <button type="submit" class="btn btn-primary">Voeg evenement toe</button>
            </form>
        </div>
    </div>
</div>
@endsection