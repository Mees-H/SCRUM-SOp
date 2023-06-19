@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Voeg lid toe</h1>
            <a href="/members" class="btn btn-primary" autofocus>Ga terug</a>
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
            <form method="post" action="{{ route('members.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Naam:</label>
                    *<input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" id="name" required/>

                </div><br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    *<input type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="email" required/>
                </div><br>

                <div class="form-group">
                    <label for="phonenumber">Telefoonnummer:</label>
                    <input type="tel" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber"  value="{{old('phonenumber')}}" id="phonenumber"/>
                    <small id="examplenumber" class="form-text text-muted">Bijv: 0612345678</small>
                </div><br>

                <div class="form-group">
                    <label for="function">Functie:</label>
                    <input type="text" class="form-control @error('function') is-invalid @enderror"  value="{{old('function')}}" name="function" id="function"/>
                </div><br>

                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" class="form-control @error('website') is-invalid @enderror"  value="{{old('website')}}" name="website" id="website"/>
                </div><br>

                <div class="form-group">
                    <label for="image">Foto:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror"  value="{{old('image')}}" name="image" id="image"/>
                </div><br>

                <label>Groepen:*</label>
                @foreach($groups as $group)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('groups[]') is-invalid @enderror" name="groups[]" value="{{$group->id}}" id="{{$group->id}}"/>
                    <label for="{{$group->id}}" class="form-check-label">{{$group->name}}</label>
                </div>
                @endforeach
                <br>

                <button type="submit" class="btn btn-primary">Voeg lid toe</button>
            </form>
        </div>
    </div>
</div>
@endsection
