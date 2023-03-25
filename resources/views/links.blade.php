@extends('layouts.layout')

@section('content')
    <div class="">
        <h1 class="text-center p-4">Links</h1>
<div class="container">
    @foreach($links->keys() as $category)
        <div class="row">
        <div class="siteMap col-sm">{{$category}}</div>
            <div class="w-50 col-sm d-flex flex-column">
        @foreach($links[$category] as $link)
            <div class="row"><a class="siteMap effect-underline" href="{{$link->verwijzing}}">{{$link->naam}}</a><div></div></div>
        @endforeach
            </div>
        </div>
        <hr>
    @endforeach
</div>
    </div>
@stop
