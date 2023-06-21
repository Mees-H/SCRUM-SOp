@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Partner aanpassen</h1>
            <a href="/groups" class="btn btn-primary" autofocus>Ga terug</a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <form method="post" action="{{ route('groups.update', $group->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group mt-2">
                    <label for="name"><span class="requiredStar">*</span>Naam van de partner:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$group->name}}" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="housenumber"><span class="requiredStar">*</span>Huisnummer:</label>
                    <input type="text" class="form-control @error('housenumber') is-invalid @enderror" name="housenumber" id="housenumber"
                           value="{{$group->housenumber}}" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="street"><span class="requiredStar">*</span>Straat:</label>
                    <input type="text" class="form-control @error('street') is-invalid @enderror" name="street" id="street" value="{{$group->street}}" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="zipcode"><span class="requiredStar">*</span>Postcode:</label>
                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" id="zipcode" value="{{$group->zipcode}}" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="city"><span class="requiredStar">*</span>Plaats:</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{$group->city}}" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="link"><span class="requiredStar">*</span>Verwijzing:</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="bv www.google.com"
                           value="{{$group->link}}" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="contact_person"><span class="requiredStar">*</span>Contactpersoon:</label>
                    <input type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" id="contact_person"
                           value="{{$group->contact_person}}" required/>
                </div>
                <div class="form-group mt-2 row">
                    <div class="col-auto">
                        <p>Huidig logo:</p>
                        <img src="{{asset('img/'.$group->imageurl)}}" alt="Foto van het huidige logo"
                             class="partner-logo-big">
                    </div>
                    <div class="col-8">
                        <label for="imageurl">Nieuw logo uploaden (niks invullen betekend oude behouden):</label>
                        <input type="file" class="form-control form-control-lg @error('image') is-invalid @enderror" name="image" id="image">
                    </div>
                </div>
                <div class="form-group mt-2 mb-1">
                    <p class="mb-0 text-secondary">Huidige partners zijn te zien op de Partners pagina voor website
                        bezoekers.
                        Partners die huidig geen partner zijn kunnen nog steeds geselecteerd worden bij een
                        evenement maar zijn niet te zien op de Partners pagina voor website bezoekers.</p>
                    <input type="checkbox" class="form-check-input @error('currently_a_partner') is-invalid @enderror" name="currently_a_partner"
                           id="currently_a_partner" @if($group->currently_a_partner)checked="@checked(true)"@endif/>
                    <label for="currently_a_partner">Is huidig een
                        partner</label>
                </div>

                <button type="submit" class="btn btn-primary mt-2 mb-2">Pas partner aan</button>
            </form>
        </div>
    </div>
@endsection
