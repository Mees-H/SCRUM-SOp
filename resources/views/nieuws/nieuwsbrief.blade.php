@extends('layouts.layout')
@section('content')
<div class="row">
<div class="col-md-2">
    <div class="col-md-3">
        @include('Components.SideBar.SideBarNavigation')
    </div>
</div>
<div class="col">
    <div class="container justify-content-between ">
        <div class="row align-items-center">
            <h1 class="col">Nieuwsoverzicht</h1>
            @if (Auth::user() != null && Auth::user()->role == 'admin')
                <a href="{{ route('nieuws.create')}}" class="col-2 btn btn-primary">Creeër nieuw nieuwsartikel</a>
            @endif
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
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Nieuwsartikelen</h1>
                    @foreach($articles as $article)
                        <div class="row card-body">
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
                                            <img src="{{ asset('storage/img/nieuws/'.$imgurl) }}"
                                                    alt="{{$imgurl}}" class="memberimg"/>
                                        @endforeach
                                    </aside>
                                @endif
                        </div>
                        @if (Auth::user() != null && Auth::user()->role == 'admin')
                            <aside class="row card-body">
                                <div class="col">
                                    <form action="{{ route('nieuws.destroy', $article->id)}}" method="post">
                                        <a href="{{ route('nieuws.edit', $article->id)}}" class="col btn btn-primary">Pas nieuwsartikel aan</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="col btn btn-danger" type="submit">Verwijder nieuwsartikel</button>
                                    </form>
                                </div>
                            </aside>
                        @endif
                        <hr>
                    @endforeach
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h1 class="card-header">Nieuwsbrieven</h1>
                    <div class="card-body">
                        <p>De nieuwsbrieven van de afgelopen jaren zijn hieronder te vinden.</p>
                        <ul class="list-unstyled">
                            @foreach($articles as $article)
                                @if($article->fileurl != null)
                                    @foreach($article->fileurl as $file)
                                        <li class="mb-3">
                                            <a class="btn"><i class="bi bi-arrow-left-circle-fill"> {{$file}}</i></a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop