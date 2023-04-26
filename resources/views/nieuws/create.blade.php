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
            <a href="/nieuws" class="col-2 btn btn-secondary">Ga terug</a>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <div class="card">
                    <h1 class="card-header">Nieuwsartikelen</h1>
                    <!--Start form-->
                    <form method="post" action="{{ route('nieuws.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row card-body">
                            <div class="col-sm-7">
                                <input class="form-control form-control-lg mb-2" type="text" placeholder="Titel" name="title">
                                <input class="form-control form-control-sm mb-2" type="date" placeholder="Datum" name="date">
                                <textarea class="form-control mb-2" rows="3" placeholder="Beschrijving" name="body"></textarea>
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
                            </div>
                        </div>
                        <hr>
                    </form>
                    <!--End form-->
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
