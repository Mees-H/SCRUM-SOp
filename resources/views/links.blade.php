@extends('layouts.layout')

@section('content')
    <div class="">
        <h1 class="text-center specialBrown p-4"><b>Links</b></h1>
    @foreach($links as $category)
        <h2 class="specialBrown">{{$category['name']}}</h2>
        <div class="container">
        @foreach($category['links'] as $link)
            <div class="row">
                <div class="col">{{$link['name']}}</div>
                <div class="col">{{$link['name']}}</div>
                <div class="row col"><a class="siteMap effect-underline justify-content-between text-center
            " href="{{$link['link']}}">{{$link['name']}}</a><div></div></div>
            </div>
        @endforeach
        </div>
        <hr>
    @endforeach
    </div>
@stop
