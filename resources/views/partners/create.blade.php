@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Voeg partner toe</h1>
            <a href="/groups" class="btn btn-primary mb-1">Ga terug</a>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p><span class="requiredStar">*</span>Verplicht</p>
                <form method="POST" action="{{ route('groups.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name"><span class="requiredStar">*</span>Naam van de partner:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="housenumber"><span class="requiredStar">*</span>Huisnummer:</label>
                        <input type="text" class="form-control" name="housenumber" id="housenumber"
                               value="{{old('housenumber')}}" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="street"><span class="requiredStar">*</span>Straat:</label>
                        <input type="text" class="form-control" name="street" id="street" value="{{old('street')}}" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="zipcode"><span class="requiredStar">*</span>Postcode:</label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{old('zipcode')}}" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="city"><span class="requiredStar">*</span>Plaats:</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{old('city')}}" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="link"><span class="requiredStar">*</span>Verwijzing:</label>
                        <input type="text" class="form-control" name="link" id="link" placeholder="bv www.google.com"
                               value="{{old('link')}}" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="contact_person"><span class="requiredStar">*</span>Contactpersoon:</label>
                        <input type="text" class="form-control" name="contact_person" id="contact_person"
                               value="{{old('contact_person')}}" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="image"><span class="requiredStar">*</span>Upload logo:</label>
                        <input type="file" class="form-control form-control-lg" name="image" id="image" required>
                    </div>
                    <div class="form-group mt-2 mb-1">
                        <p class="mb-0 text-secondary">Huidige partners zijn te zien op de Partners pagina voor website
                            bezoekers.
                            Partners die huidig geen partner zijn kunnen nog steeds geselecteerd worden bij een
                            evenement maar zijn niet te zien op de Partners pagina voor website bezoekers.</p>
                        <input type="checkbox" class="form-check-input" name="currently_a_partner"
                               id="currently_a_partner" @if(old('currently_a_partner'))checked="@checked(true)"@endif/>
                        <label for="currently_a_partner">>Is huidig een
                            partner</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2 mb-2">Voeg partner toe</button>
                </form>
            </div>
        </div>
    </div>
@endsection
