@extends('layouts.layout')
 
@section('content')
@if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div>
    <a href="/training/signout" class="btn btn-primary mb-3">Afmelden</a>
</div>   
@stop