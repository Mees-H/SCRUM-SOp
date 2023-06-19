@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-12 container">
        <h1 class="display-3">Trainingen</h1>
        <div class="justify-content-between d-lg-flex mb-3">
            <a id="Creeër nieuwe training" href="{{ route('trainingsessions.create')}}" class="btn btn-primary">Creeër nieuwe training</a>
            <div class="d-flex align-items-center">
                <div class="bg-info" style="min-width: 1em;min-height: 1em;max-width: 1em;max-height: 1em"></div>
                <span> = vakantie week</span>
            </div>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
{{--        @if ($agent->isMobile())--}}
{{--        <div>--}}
{{--            <table class="table table-striped">--}}
{{--                <thead>--}}
{{--                    <tr>--}}
{{--                        <td>Datum</td>--}}
{{--                        <td>Beschrijving</td>--}}
{{--                        <td>Groep</td>--}}
{{--                        <td colspan = 2>Actions</td>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                    @foreach($sessions as $session)--}}
{{--                        <tr>--}}
{{--                            <td>{{ \Carbon\Carbon::parse($session->Date)->format('d-m-Y')}}</td>--}}
{{--                            <td>{{$session->Description}}</td>--}}
{{--                            <td>Groep {{$session->GroupNumber}}</td>--}}
{{--                            <td>--}}
{{--                                <a href="{{ route('trainingsessions.edit',$session->Id)}}" class="btn btn-primary">Aanpassen</a>--}}

{{--                                <form action="{{ route('trainingsessions.destroy', $session->Id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button class="btn btn-danger" type="submit">Verwijderen</button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}

{{--        @endif--}}

{{--        @if (!$agent->isMobile())--}}
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Datum</td>
                        <td>tijd</td>
                        <td>Beschrijving</td>
                        <td>Groep</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sessions as $session)
                        <tr @if(!$session->IstrainingSession)class="bg-info border-info" @endif>
                            <td>{{ \Carbon\Carbon::parse($session->Date)->format('d-m-Y')}}</td>
                            <td>{{date('H:i', strtotime($session->StartTime))}} - {{date('H:i', strtotime($session->EndTime))}}</td>
                            <td>{{$session->Description}}</td>
                            <td>Groep {{$session->GroupNumber}}</td>
                            <td>
                                <div class="d-flex h-100 flex-wrap">
                                    <a href="{{ route('trainingsessions.edit',$session->Id)}}" class="btn btn-primary">Aanpassen</a>
                                    <form action="{{ route('trainingsessions.destroy', $session->Id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Verwijderen</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
{{--        @endif--}}

    <div>
</div>
@endsection
