@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
        <title>Nieuwsartikel aanpassen</title>
    </head>

    <div class="container">
        <div class="d-flex justify-content-center">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->get('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
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
                    <h1 class="text-black border-bottom">Nieuwsartikel Aanpassen</h1>
                    <div class="card border-0">
                        <form method="post" action="{{ route('nieuwsartikel.update', $editArticle->id) }}"
                              enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row card-body">
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control form-control-lg mb-2 @error('title') is-invalid @enderror" type="text" placeholder="Titel *" name="title" value="{{$editArticle->title}}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control form-control-sm mb-2 @error('date') is-invalid @enderror" type="date" placeholder="Datum *" name="date" value="{{$editArticle->date}}" required>
                                        </div>
                                    </div>
                                    <textarea class="form-control mb-2 @error('body') is-invalid @enderror" rows="7" placeholder="Beschrijving *" name="body" required>{{$editArticle->body}}</textarea>
                                </div>

                                <aside class="col-sm-5">
                                    <div class="mb-3">
                                        <label for="img[]" class="form-label">Foto's</label>
                                        <input class="form-control @error('img[]') is-invalid @enderror" type="file" name="img[]" id="img[]"
                                               multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label for="file[]" class="form-label">Bestanden</label>
                                        <input class="form-control @error('file[]') is-invalid @enderror" type="file" name="file[]" id="file[]"
                                               multiple>
                                    </div>
                                </aside>
                                <div class="col-sm-12">
                                    @if(!empty($editArticle->imgurl))
                                    <label class="form-label">Verwijder foto's</label>
                                        @foreach($editArticle->imgurl as $img)
                                            <div class="form-check">
                                                <input class="form-check-input @error('deleteImages[]') is-invalid @enderror" type="checkbox"
                                                       value="{{$img}}"
                                                       id="{{$img}}" name="deleteImages[]">
                                                <label for="{{$img}}" class="form-check-label">
                                                    <img class="memberimg w-25 m-1" alt="artikel afbeelding"
                                                         src="{{ asset('img/'.$img)}}"/>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit" alt="bevestig artikel aanpassen">Pas artikel aan</button>
                                    <a class="btn btn-danger" type="reset" href="/nieuwsartikel" alt="annuleer bewerken">Annuleren</a>
                                </div>
                            </div>
                        </form>

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



