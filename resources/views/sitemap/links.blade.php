@extends('layouts.layout')

@section('content')
    <div class="px-4">
        <div class="d-flex row justify-content-center">
            @foreach($links as $category)
                <div class="col-md-auto  p-3">
                    <h2>{{$category['name']}}</h2>
                    @foreach($category['links'] as $link)
                        <div>
                            <a href="{{$link['link']}}" alt="{{$link['alt']}}">{{$link['name']}}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@stop

