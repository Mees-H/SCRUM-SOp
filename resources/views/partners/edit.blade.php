@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Partner aanpassen</h1>
            <a href="/partners" class="btn btn-primary">Ga terug</a>

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
            <form method="post" action="{{ route('groups.update', $group->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group mt-2">
                    <label for="name"><span class="requiredStar">*</span>Naam van de partner:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$group->name}}"/>
                </div>
                <div class="form-group mt-2">
                    <label for="housenumber"><span class="requiredStar">*</span>Huisnummer:</label>
                    <input type="number" class="form-control" name="housenumber" id="housenumber"
                           value="{{$group->housenumber}}"/>
                </div>
                <div class="form-group mt-2">
                    <label for="street"><span class="requiredStar">*</span>Straat:</label>
                    <input type="text" class="form-control" name="street" id="street" value="{{$group->street}}"/>
                </div>
                <div class="form-group mt-2">
                    <label for="zipcode"><span class="requiredStar">*</span>Postcode:</label>
                    <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{$group->zipcode}}"/>
                </div>
                <div class="form-group mt-2">
                    <label for="city"><span class="requiredStar">*</span>Plaats:</label>
                    <input type="text" class="form-control" name="city" id="city" value="{{$group->city}}"/>
                </div>
                <div class="form-group mt-2">
                    <label for="link"><span class="requiredStar">*</span>Verwijzing:</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="bv www.google.com"
                           value="{{$group->link}}"/>
                </div>
                <div class="form-group mt-2">
                    <label for="contact_person"><span class="requiredStar">*</span>Contactpersoon:</label>
                    <input type="text" class="form-control" name="contact_person" id="contact_person"
                           value="{{$group->contact_person}}"/>
                </div>
                <div class="form-group mt-2">
                    <label for="imageurl"><span class="requiredStar">*</span>Logo url:</label>
                    <input type="text" class="form-control" name="imageurl" id="imageurl"
                           placeholder="bv https://pr78-specialgolf.azurewebsites.net/img/specialgolflogodark.png"
                           value="{{$group->imageurl}}"/>
                </div>
                <div class="form-group mt-2 mb-1">
                    <p class="mb-0 text-secondary">Huidige partners zijn te zien op de Partners pagina voor website
                        bezoekers.
                        Partners die huidig geen partner zijn kunnen nog steeds geselecteerd worden bij een
                        evenement maar zijn niet te zien op de Partners pagina voor website bezoekers.</p>
                    <input type="checkbox" class="form-check-input" name="currently_a_partner"
                           id="currently_a_partner" @if($group->currently_a_partner)checked="@checked(true)"@endif/>
                    <label for="currently_a_partner"><span class="requiredStar">*</span>Is huidig een
                        partner</label>
                </div>

                <button type="submit" class="btn btn-primary mt-2 mb-2">Pas partner aan</button>
            </form>
        </div>
    </div>
@endsection
