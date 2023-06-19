@extends('layouts.layout')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
        Wij hechten er veel waarde aan om uw privacy te waarborgen en gaan daarom zorgvuldig om met persoonsgegevens. 
        Wij houden ons in alle gevallen aan de toepasselijke wet- en regelgeving. 
        Dit brengt met zich mee dat wij: uw persoonsgegevens verwerken in overeenstemming met het doel waarvoor deze zijn verstrekt, 
        de verwerking van persoonsgegevens beperken tot gegevens welke minimaal nodig zijn voor de doeleinden waarvoor ze worden verwerkt, 
        passende organisatorische maatregelen nemen, zodat de beveiliging van uw persoonsgegevens gewaarborgd zijn, 
        geen persoonsgegevens worden doorgeven aan andere partijen, 
        tenzij dit nodig is voor uitvoering van de doeleinden waarvoor ze worden verstrekt.
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mt-5">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li class="text-center">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($beschikbaar))
        <div class="alert alert-danger mt-5">
            <li class="text-center">{{ $beschikbaar }}</li>
        </div>
    @else
        <object data="{{asset('files\avg.pdf')}}" type="application/pdf" width="100%" height="100%" style="height: 80vh">
            <div class="d-flex align-items-center flex-column-reverse" style="height: 60vh">
                <a class="btn btn-primary" href="/privacy/download">Download PDF</a>
            </div>
        </object>
    @endif
@stop
