@extends('layouts.layout')

@section('content')
    <div class="">
        <h1 class="text-center specialBrown p-4"><b>Links</b></h1>
    @foreach($links as $category)
            <div class="container"><div class="row">
                <div class="col d-flex"><h2 class="specialBrown">{{$category['name']}}</h2></div>
                    <div class="col">
        @foreach($category['links'] as $link)
                <div class="row"><a class="siteMap effect-underline" href="{{$link['link']}}">{{$link['name']}}</a><div></div></div>
        @endforeach</div>
                </div>
        </div>
        <hr>
    @endforeach
    </div>
@stop
