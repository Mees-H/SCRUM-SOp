@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="text-center pt-2 display-3">Links</h1>
        <div class="d-flex justify-content-center">
            @foreach($links as $category)
                <div class="row-cols-md m-3 justify-content-around">
                    <h2>{{$category['name']}}</h2>
                    @foreach($category['links'] as $link)
                        <div class="row">
                            <a href="{{$link['link']}}" alt="{{$link['alt']}}">{{$link['name']}}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@stop

