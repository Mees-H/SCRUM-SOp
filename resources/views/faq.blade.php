@extends('layouts.layout')
 
@section('content')

    <div class="container text-center">
        <div class="row align-items-center">
            <h1 class="col">FAQ</h1>
            <div class="col">
                <a href="/faq/vraagformulier" class="btn-primary btn">Stel een vraag</a>
            </div>
        </div>
    </div>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

@stop