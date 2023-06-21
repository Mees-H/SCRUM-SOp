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
            <form method="post" action="{{ route('members.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Naam:</label>
                    *<input type="text" class="form-control" value="{{old('name')}}" name="name" id="name"/>

                </div><br>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    *<input type="text" class="form-control" value="{{old('email')}}" name="email" id="email"/>
                </div><br>

                <div class="form-group">
                    <label for="phonenumber">Telefoonnummer:</label>
                    <input type="tel" class="form-control" name="phonenumber"  value="{{old('phonenumber')}}" id="phonenumber"/>
                    <small id="examplenumber" class="form-text text-muted">Bijv: 0612345678</small>
                </div><br>

                <div class="form-group">
                    <label for="function">Functie:</label>
                    <input type="text" class="form-control"  value="{{old('function')}}" name="function" id="function"/>
                </div><br>

                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" class="form-control"  value="{{old('website')}}" name="website" id="website"/>
                </div><br>

                <div class="form-group">
                    <label for="image">Foto:</label>
                    <x-image-size-warning></x-image-size-warning>
                    <input type="file" class="form-control"  value="{{old('image')}}" name="image" id="image"/>
                </div><br>

                <label>Groepen:*</label>
                @foreach($groups as $group)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="groups[]" value="{{$group->id}}" id="{{$group->id}}"
                            @if(in_array($group->id, old('groups', []))) checked @endif />
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
