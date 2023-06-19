@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
        <title>Nieuwsartikelen</title>
    </head>
    <div class="row d-flex">
        <div class="col-sm-2 mx-3" id="wrapper">
            @if (Auth::user() != null && Auth::user()->role == 'admin')
                <div class="justify-content-start p-2">
                <div class="row pb-2">
                    <a href="{{ route('nieuwsartikel.create')}}" class="btn btn-primary">Nieuw artikel</a>
                </div>

                </div>
                @endif
            @include('components.SideBar.articles-side-bar-navigation', ['articles' => $articles], ['years' => $years])
        </div>
        <div class="col-md-9">
            <div>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session()->get('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>

            <div class="border-0">
                <div class="d-flex justify-content-between container pb-2">
                    <h1 class="text-black">Nieuwsartikelen</h1>
                    <div id="filter_mobile">
                        <div class="mt-2 pb-3">
                            <form method="Get" action="{{route('newsArticle.sorting')}}" class="d-flex">
                                @csrf
                                <div class="form-group">
                                    <label for="sort" class="overflow-x-auto m-1">Sorteren op:</label>
                                    <select class="form-select" id="sort" name="sort" onchange="this.form.submit()">
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
                            <small>Datum: {{ \Carbon\Carbon::parse($article->date)->format('d-m-Y')}}</small>
                            @if($article->imgurl != null)
                                <div class="col">
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
                                            <div class="col-md-5">
                                                @foreach($article->imgurl as $imgurl)
                                                    <div>
                                                    <img
                                                        src="{{ asset('img/'.$imgurl) }}"
                                                        alt="{{$imgurl}}" class=" art_image"/>

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                </div>
                                @if (Auth::user() != null && Auth::user()->role == 'admin')
                                    <aside class="row card-body">
                                        <div class="col">
                                            <form action="{{ route('nieuwsartikel.destroy', $article->id)}}"
                                                  method="post">
                                                <a href="{{ route('nieuwsartikel.edit', $article->id)}}"
                                                   class="col btn btn-dark">Pas nieuwsartikel aan</a>

                                                @csrf
                                                @method('DELETE')
                                                <button class="col btn btn-danger" type="submit" alt="verwijder artikel">
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
        </div>
        @stop

