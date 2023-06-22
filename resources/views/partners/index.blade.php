@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12 container">
            <h1 class="display-3">Groepen en partners</h1>
            <p>Huidige partners zijn te zien op de Partners pagina voor website bezoekers.
                Partners die huidig geen partner zijn kunnen nog steeds geselecteerd worden bij een evenement maar
                zijn niet te zien op de Partners pagina voor website bezoekers.</p>
            <div class="justify-content-between d-lg-flex mb-3">
                <a href="{{ route('groups.create')}}" class="btn btn-primary" autofocus>Creeër een nieuwe
                    partner</a>
                <a class="btn btn-secondary" href="/partners">Bekijk bezoekers pagina</a>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->get('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Naam partner</td>
                    <td>Adres</td>
                    <td>Verwijzing</td>
                    <td>Contact persoon</td>
                    <td>Logo</td>
                    <td>Is huidig een partner</td>
                    <td colspan=2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>
                            {{$group->name}}
                        </td>
                        <td>
                            <p>{{$group->street}} {{$group->housenumber}}</p>
                            <p>{{$group->zipcode}} {{$group->city}}</p>
                        </td>
                        <td>
                            <a href="//{{$group->link}}">{{$group->link}}</a>
                        </td>
                        <td>
                            {{$group->contact_person}}
                        </td>
                        <td>
                            <img class="partner-logo" src="{{asset('img/'.$group->imageurl)}}"
                                 alt="Logo van {{$group->name}}">
                        </td>
                        <td>
                            @if($group->currently_a_partner === 1)
                                Ja
                            @else
                                Nee
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('groups.edit',$group->id)}}" class="btn btn-primary"
                               dusk="edit-partner-button">Aanpassen</a>
                        </td>
                        <td>
                            <form action="{{ route('groups.destroy', $group->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" dusk="remove-partner-button">Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
