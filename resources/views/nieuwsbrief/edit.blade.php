@extends('layouts.layout')
@section('content')
    <head>
        <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
        <title>Nieuwsbrief</title>
    </head>

    <div class="row">
        <div class="col-md-2 mx-3" id="wrapper">
            {{-- @include('Components.SideBar.SideBarNavigation', ['newsLetters' => $newsLetters]) --}}
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
                                <h1 class="text-black">Nieuwsbrieven</h1>
                                <div class="card border-0">
                                    <form method="post" action="{{ route('nieuwsbrief.update', $newsletter->id) }}" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row card-body">
                                            <div class="col-sm-7">
                                                <label for="date" class="form-label">Datum</label>
                                                <input class="form-control form-control-sm mb-2" type="date" placeholder="Datum *" name="date" value="{{ $newsletter->date }}">
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
    </div>

@endsection
