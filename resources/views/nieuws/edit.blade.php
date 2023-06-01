@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
        <title>Nieuwsbrief</title>
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
                    <h1 class="text-black border-bottom">Nieuwsartikelen Aanpassen</h1>
                    <div class="card border-0">
                        <form method="post" action="{{ route('nieuws.update', $editArticle->id) }}"
                              enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row card-body">
                                <div class="col-sm-7">
                                    <label>
                                        <input class="form-control form-control-lg mb-2" type="text"
                                               placeholder="Titel *" name="title"
                                               value="{{$editArticle->title}}">
                                        <input class="form-control form-control-sm mb-2" type="date"
                                               placeholder="Datum *" name="date"
                                               value="{{$editArticle->date}}">
                                        <textarea class="form-control mb-2" rows="3"
                                                  placeholder="Beschrijving *"
                                                  name="body">{{$editArticle->body}}</textarea>
                                    </label>
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
                                                <input class="form-check-input" type="checkbox"
                                                       value="{{$img}}"
                                                       id="{{$img}}" name="deleteImages[]">
                                                <label for="{{$img}}" class="form-check-label">
                                                    <img class="memberimg" alt="artikel afbeelding"
                                                         src="{{ asset('storage/img/nieuws/'.$img)}}"/>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit" alt="bevestig artikel aanpassen">Pas artikel aan</button>
                                    <a class="btn btn-danger" type="reset" href="/nieuws" alt="annuleer bewerken">annuleren</a>
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



