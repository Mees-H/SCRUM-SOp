@extends('layouts.layout')
@section('content')
<div>
    <div class="container justify-content-between d-flex pt-3">
            <h1 class="darkTitle">
                {{$event->title}}
            </h1>
        <div>
            <a class="btn btn-secondary" href="/evenement">Terug</a>
        </div>
    </div>
        <div class="m-2 p-3 font-normal">
            {{$event->body}}
        </div>

    <div class="container mt-5 d-flex">
        <div class="row">
        <div class="col">
            {{$event->date}} om {{$event->time}}
        </div>
        </div>
    </div>

</div>


@stop
