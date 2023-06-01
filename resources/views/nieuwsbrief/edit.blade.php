@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
        <title>Nieuwsbrief Aanpassen</title>
    </head>

    <div class="row">
            <div class="container justify-content-center d-flex">
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
                        <div class="col-md-12">
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
                                <h1 class="text-black">Nieuwsbrief Aanpassen</h1>
                                <div class="card border-0">
                                    <form method="post" action="{{ route('nieuwsbrief.update', $newsletter->id) }}" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row card-body">
                                            <div class="col-sm-9">
                                                <label for="date" class="form-label">Datum</label>
                                                <label>
                                                    <input class="form-control form-control-sm mb-2" type="date" placeholder="Datum *" name="date" value="{{ $newsletter->date }}">
                                                </label>
                                                <label for="file" class="form-label">PDF bestand</label>
                                                <div class="pdf-container mb-2">
                                                    <embed src="{{ asset('storage/files/nieuws/' . $newsletter->pdf) }}" width="500" height="375" type="application/pdf">
                                                </div>
                                                <label for="file" class="form-label">Wijzig PDF bestand</label>
                                                <input class="form-control" type="file" name="file" id="file">
                                            </div>

                                        </div>
                                        <div class="col">
                                            <button class="btn btn-primary" type="submit">Wijzig nieuwsbrief</button>
                                            <a class="btn btn-danger" alt="annuleer aanmaken" type="reset" href="/nieuws">Annuleren</a>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
