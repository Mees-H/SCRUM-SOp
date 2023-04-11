@extends('layouts.layout')
 
@section('content')
    <div class="">
        <h1 class="text-center specialBrown p-4"><b>Links</b></h1>
        <div class="d-flex flex-row flex-wrap justify-content-center">
            @foreach($links as $category)
                <div class="w-25 pb-3">
                    <div class="">
                        <div class="">
                            <h2 class="specialBrown">{{$category['name']}}</h2>
                        </div>
                        <div class="col">
                            @foreach($category['links'] as $link)
                                <div class="row">
                                    <a href="{{$link['link']}}">{{$link['name']}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

