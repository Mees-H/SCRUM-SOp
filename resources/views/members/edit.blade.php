@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Lid aanpassen
        <a href="/members" class="btn btn-primary" autofocus>Ga terug</a></h1>

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
        <form method="post" action="{{ route('members.update', $member->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Naam:
                *<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$member->name}}" required/>
                </label>
            </div><br>

            <div class="form-group">
                <label for="email">E-mail:</label>
                *<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$member->email}}" required/>
            </div><br>

            <div class="form-group">
                <label for="phonenumber">Telefoonnummer:</label>
                <input type="tel" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" id="phonenumber" value="{{$member->phonenumber}}"/>
                <small id="examplenumber" class="form-text text-muted">Bijv: 0612345678</small>
            </div><br>

            <div class="form-group">
                <label for="function">Functie:</label>
                <input type="text" class="form-control @error('function') is-invalid @enderror" name="function" id="function" value="{{$member->function}}"/>
            </div><br>

            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="website" value="{{$member->website}}"/>
            </div><br>

            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{$member->imgurl}}"/>
                <small id="imagehelp" class="form-text text-muted">Laat leeg om foto te verwijderen.</small>
            </div><br>

            <label>Groepen:*</label>
                @foreach($groups as $group)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('groups[]') is-invalid @enderror" name="groups[]" value="{{$group->id}}" id="{{$group->id}}"
                    {{in_array($group->id, $member->groups()->allRelatedIds()->toArray())? 'checked':''}}/>
                    <label for="{{$group->id}}" class="form-check-label">{{$group->name}}</label>
                </div>
                @endforeach
                <br>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
