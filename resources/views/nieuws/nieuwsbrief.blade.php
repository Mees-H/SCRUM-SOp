@extends('layouts.layout')

@section('content')
    <div class="container justify-content-between ">
        <div class="row align-items-center">
            <h1 class="col">Nieuwsbrief</h1>
        </div>
    </div>
    <div class="container">
    <hr>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @elseif(session()->get('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @foreach($articles as $article)
    <div class="row">
        <h1>{{$article->title}}</h1>
        <small>Datum: {{$article->date}}</small>
        @if($article->imgurl != null)
        <div class="col-sm-7">
        @else
        <div class="col">
        @endif
            <p>{{$article->body}}</p>
            @if($article->fileurl != null)
            @foreach($article->fileurl as $file)
            <a href="{{asset('storage/files/nieuws/'.$file)}}">{{$file}}</a>
            @endforeach
            @endif
        </div>
        @if($article->imgurl != null)
        <aside class="col">
            @foreach($article->imgurl as $imgurl)
            <img src="{{ asset('storage/img/nieuws/'.$imgurl) }}" alt="{{$imgurl}}" class="memberimg"/>
            @endforeach
        </aside>
        @endif
        <hr>
    </div>
    @endforeach
@stop