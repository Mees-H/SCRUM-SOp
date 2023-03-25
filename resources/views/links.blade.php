@extends('layouts.layout')

@section('content')
    <div class="">
        <h1 class="text-center specialBrown p-4"><b>Links</b></h1>
    @foreach($links->keys() as $category)
        <h2 class="specialBrown">{{$category}}</h2>
        <div class="container">
        @foreach($links[$category] as $link)
            <div class="row">
                <div class="col">{{$link->functie}}</div>
                <div class="col">{{$link->naam}}</div>
                <div class="row col"><a class="siteMap effect-underline justify-content-between text-center
                " href="{{$link->verwijzing}}">{{$link->verwijzing}}</a><div></div></div>
            </div>
        @endforeach
        </div>
        <hr>
    @endforeach
    </div>
@stop
