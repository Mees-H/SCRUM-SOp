@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Training groepen</h1>
        <div class="justify-content-evenly d-lg-flex mb-3">
            <form action="/traininggroups" method="post">
                @csrf
                <button class="btn btn-primary" type="submit" dusk="remove-event-button">Groep toevoegen</button>
            </form>
            <a href="/traininggroups/participants/create" class="btn btn-primary" dusk="create-event-button">Persoon toevoegen</a>
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

        <div>
            <table class="table table-striped">
                <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <th scope="row">
                                <div class="row"><h2>{{$group->Name}}</h2></div>
                                <div class="row">
                                    <form action="/traininggroups/{{$group->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" dusk="remove-event-button">Verwijderen</button>
                                    </form>
                                </div>
                            </th>
                            <td>
                                <div class="row mb-2">
                                    @for($i = 0; $i < $group->participants->count(); $i++)
                                        <div class="col">{{$group->participants[$i]->Name}}</div>
                                        <div class="col">
                                            <form action="/traininggroups/participants/{{$group->participants[$i]->id}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" dusk="remove-event-button">Verwijderen</button>
                                            </form>
                                        </div>
                                        @if($i % 2 == 1)
                                </div>
                                <div class="row mb-2">
                                        @endif
                                    @endfor
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
