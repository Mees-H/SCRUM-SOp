@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
        <title>Nieuwsbrief</title>
    </head>
    <div class="row">
        <div class="col-md-2 mx-3" id="wrapper">
            @include('Components.SideBar.SideBarNavigation', ['articles' => $articles])
        </div>
        <div class="col">
            <div class="container">
                <div class="row">
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
                            <div class="border-0">
                                <div class="d-flex justify-content-between container pb-2">

                                    <h1 class="text-black">Nieuwsartikelen</h1>
                                    @if (Auth::user() != null && Auth::user()->role == 'admin')
                                        <div>
                                            <a href="{{ route('nieuws.create')}}" class="btn btn-primary">Nieuw artikel</a>
                                        </div>
                                    @endif

                                    <div id="filter_mobile">
                                        <div class="mt-2 pb-3">
                                            <form method="GET" action="/nieuws" class="d-flex">
                                                <label for="sort" class="overflow-auto m-1">Sorteren op:</label>
                                                <div class="form-group">
                                                    <select class="form-select" id="sort"  onchange="this.form.submit()">
                                                        <option value="date_desc" class="dropdown-item">Datum Aflopend</option>
                                                        <option value="date_asc" class="dropdown-item">Datum Oplopend</option>
                                                        <option value="title_desc" class="dropdown-item">Titel Aflopend</option>
                                                        <option value="title_asc" class="dropdown-item">Titel Oplopend</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>


                                <div class="card border-0">
                                    @foreach($articles as $article)
                                        <div id="{{$article->id}}" class="row card-body">
                                            <h2 id="articleTitle">{{$article->title}}</h2>
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
                                                                    <img
                                                                        src="{{ asset('storage/img/nieuws/'.$imgurl) }}"
                                                                        alt="{{$imgurl}}" class="memberimg"/>
                                                                @endforeach
                                                            </aside>
                                                        @endif
                                                </div>
                                                @if (Auth::user() != null && Auth::user()->role == 'admin')
                                                    <aside class="row card-body">
                                                        <div class="col">
                                                            <form action="{{ route('nieuws.destroy', $article->id)}}"
                                                                  method="post">
                                                                <a href="{{ route('nieuws.edit', $article->id)}}"
                                                                   class="col btn btn-primary">Pas nieuwsartikel aan</a>

                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="col btn btn-danger" type="submit">
                                                                    Verwijder nieuwsartikel
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </aside>
                                                @endif
                                                <hr>
                                                @endforeach
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card border-0 p-3">
                                    <h1 class="text-black">Nieuwsbrieven</h1>
                                    @if (Auth::user() != null && Auth::user()->role == 'admin')
                                        <div>
                                            <a href="{{ route('nieuwsbrief.create')}}" class="btn btn-primary">Nieuwe nieuwsbrief</a>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <p>De nieuwsbrieven van de afgelopen jaren zijn hieronder te vinden.</p>
                                        <ul class="list-unstyled">
                                            @foreach($newsLetters as $newsLetter)
                                                <li class="mb-3">
                                                    <small>Datum: {{$newsLetter->date}}</small>
                                                    <div class="pdf-container">
                                                        <embed src="{{ asset('storage/files/nieuws/' . $newsLetter->pdf) }}" width="500" height="375" type="application/pdf">
                                                    </div>
                                                    @if (Auth::user() != null && Auth::user()->role == 'admin')
                                                        <aside class="row card-body">
                                                            <div class="col-md-6">
                                                                <a href="{{ route('nieuwsbrief.edit', $newsLetter->id)}}" class="btn btn-primary">Pas nieuwsbrief aan</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <form action="{{ route('nieuwsbrief.destroy', $newsLetter->id)}}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger" type="submit">Verwijder nieuwsbrief</button>
                                                                </form>
                                                            </div>
                                                        </aside>
                                                    @endif
                                                </li>
                                                <hr>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
