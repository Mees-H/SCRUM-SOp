@extends('layouts.layout')

@section('content')

    @foreach($trainingSessions as $t)
    <p>{{$t}}</p>
    @endforeach

@stop
