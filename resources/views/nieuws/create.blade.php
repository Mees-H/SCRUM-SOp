@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
        <title>Nieuwsbrief</title>
    </head>

    <div class="row">
        <div class="col-md-2 mx-3" id="wrapper">
            @include('Components.SideBar.SideBarNavigation', ['articles' => $articles], ['years' => $years])
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br/>
                                @endif
                                <h1 class="text-black">Nieuwsartikelen</h1>
                                <div class="card border-0">
                                    <!--Start form-->
                                    <form method="post" action="{{ route('nieuws.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row card-body">
                                            <div class="col-sm-7">
                                                <label>
                                                <input class="form-control form-control-lg mb-2" type="text" placeholder="Titel *" name="title">
                                                <input class="form-control form-control-sm mb-2" type="date" placeholder="Datum *" name="date">
                                                <textarea class="form-control mb-2" rows="3" placeholder="Beschrijving *" name="body"></textarea>
                                                </label>
                                            </div>
                                            <aside class="col-sm-5">
                                                <div class="mb-3">
                                                    <label for="img[]" class="form-label">Foto's</label>
                                                    <input class="form-control" type="file" name="img[]" id="img[]" multiple>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file[]" class="form-label">Bestanden</label>
                                                    <input class="form-control" type="file" name="file[]" id="file[]" multiple>
                                                </div>
                                            </aside>
                                            <div class="col">
                                                <button class="btn btn-primary" type="submit">Voeg artikel toe</button>
                                                <a class="btn btn-danger" type="reset" href="/nieuws">annuleren</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </form>
                                    <!--End form-->
                                    @foreach($articles as $article)
                                        <div class="row card-body">
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
                                                                    <img src="{{ asset('storage/img/nieuws/'.$imgurl) }}"
                                                                         alt="{{$imgurl}}" class="img-thumbnail art_image"/>
                                                                @endforeach
                                                            </aside>
                                                        @endif
                                                </div>
                                                <hr>

                                                @endforeach
                                        </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mt-2 pb-3">
                                    <form method="GET" class="d-flex">
                                        <label for="sort" class="overflow-auto m-1">Sorteren op:</label>
                                        <div class="form-group">
                                            <select class="form-select" name="sort" disabled id="sort">
                                                <option value="date_desc">Datum Aflopend</option>
                                                <option value="date_asc">Datum Oplopend</option>
                                                <option value="title_desc">Titel Nieuw-Oud</option>
                                                <option value="title_asc">Titel Oud-Nieuw</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
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
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                let sort = "{{request()->get('sort')}}";
                $("#sort").val(sort);
            });
        </script>
@stop
