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
                                    <form method="post" action="{{ route('nieuws.update', $editArticle->id) }}"
                                          enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row card-body">
                                            <div class="col-sm-7">
                                                <input class="form-control form-control-lg mb-2" type="text"
                                                       placeholder="Titel *" name="title" value="{{$editArticle->title}}">
                                                <input class="form-control form-control-sm mb-2" type="date"
                                                       placeholder="Datum *" name="date" value="{{$editArticle->date}}">
                                                <textarea class="form-control mb-2" rows="3" placeholder="Beschrijving *"
                                                          name="body">{{$editArticle->body}}</textarea>
                                            </div>
                                            <aside class="col-sm-5">
                                                <div class="mb-3">
                                                    <label for="img[]" class="form-label">Foto's</label>
                                                    <input class="form-control" type="file" name="img[]" id="img[]"
                                                           multiple>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file[]" class="form-label">Bestanden</label>
                                                    <input class="form-control" type="file" name="file[]" id="file[]"
                                                           multiple>
                                                </div>
                                            </aside>
                                            <div class="col-sm-12">
                                                <label class="form-label">Verwijder foto's</label>
                                                @if(!\PHPUnit\Framework\isEmpty($editArticle->imgurl))
                                                @foreach($editArticle->imgurl as $img)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{$img}}"
                                                               id="{{$img}}" name="deleteImages[]">
                                                        <label for="{{$img}}" class="form-check-label">
                                                            <img class="memberimg"
                                                                 src="{{ asset('storage/img/nieuws/'.$img)}}"/>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-primary" type="submit">Voeg artikel toe</button>
                                                <a class="btn btn-danger" type="reset" href="/nieuws">annuleren</a>
                                            </div>
                                        </div>
                                    </form>
                                    <!--End form-->
                                    @foreach($articles as $article)
                                        @if($article->id != $editArticle->id)
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
                                                                        <img
                                                                            src="{{ asset('storage/img/nieuws/'.$imgurl) }}"
                                                                            alt="{{$imgurl}}" class="img-thumbnail art_image"/>
                                                                    @endforeach
                                                                </aside>
                                                            @endif
                                                    </div>
                                                @endif
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
                                            <select class="form-select" name="sort" id="sort">
                                                <option value="date_desc">Datum Aflopend</option>
                                                <option value="date_asc">Datum Oplopend</option>
                                                <option value="title_desc">Titel Nieuw-Oud</option>
                                                <option value="title_asc">Titel Oud-Nieuw</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="card border-0 p-3">
                                    <h1 class="text-black">Nieuwsbrieven</h1>
                                    <div class="card-body">
                                        <p>De nieuwsbrieven van de afgelopen jaren zijn hieronder te vinden.</p>
                                        <ul class="list-unstyled">
                                            @foreach($articles as $article)
                                                @if($article->fileurl != null)
                                                    @foreach($article->fileurl as $filename)
                                                        <li class="mb-3">
                                                            <div hidden="hidden" id="showPdf">
                                                                @include('nieuws/pdf', ['$filename' => $filename])
                                                            </div>
                                                            <a class="btn" type="button"><i
                                                                    class="bi bi-arrow-left-circle-fill"> {{$filename}}</i></a>
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



