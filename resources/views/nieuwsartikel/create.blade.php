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
                                <h1 class="text-black border-bottom">Nieuwsartikelen Toevoegen</h1>
                                <div class="card border-0">
                                    <form method="post" action="{{ route('nieuwsartikel.store') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row card-body">
                                            <div class="col">
                                                <label alt="maak een nieuw artikel aan">
                                                    <input class="form-control form-control-lg mb-2 @error('title') is-invalid @enderror" type="text"
                                                           placeholder="Titel *" name="title" value="{{old('title')}}" required autofocus>
                                                    <input class="form-control form-control-sm mb-2 @error('date') is-invalid @enderror" type="date"
                                                           placeholder="Datum *" name="date" value="{{old('date')}}" required>
                                                    <textarea class="form-control mb-2 @error('body') is-invalid @enderror" rows="3"
                                                              placeholder="Beschrijving *" name="body" required>{{old('body')}}</textarea>
                                                </label>
                                            </div>
                                            <aside class="col">
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
                                            <div class="">
                                                <button class="btn btn-primary" alt="bevestig nieuwsbrief aanmaken" type="submit">Voeg artikel toe</button>
                                                <a class="btn btn-danger" alt="annuleer aanmaken" type="reset" href="/nieuwsartikel">annuleren</a>
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
