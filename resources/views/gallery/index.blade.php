@extends('layouts.layout')
@section('content')
    <h1 class="display-3">Albums aanpassen</h1>
    <div class="justify-content-between d-lg-flex mb-3">
        <a href="{{ route('galerij.create')}}" class="btn btn-primary" dusk="create" autofocus>Creeër nieuw album</a>
    </div>
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Titel</td>
                    <td>Beschrijving</td>
                    <td>Datum</td>
                </tr>
            </thead>
            <tbody>
                @foreach($albums as $album)
                    <tr>
                        <td>{{$album->id}}</td>
                        <td>{{$album->title}} </td>
                        <td>{{$album->description}}</td>
                        <td>{{ \Carbon\Carbon::parse($album->date)->format('d-m-Y')}}</td>
                        <td>
                            <a dusk="editAlbum" href="{{ route('galerij.edit',$album->id)}}" class="btn btn-primary">Aanpassen</a>
                        </td>
                        <td>
                            <form action="{{ url('/galerij/' . $album->id . '/addPhoto') }}" method="GET">
                                @csrf
                                <input type="hidden" name="album_id" value="{{ $album->id }}">
                                <button type="submit" class="btn btn-primary wide-button">Foto's toevoegen</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('galerij.destroy', $album->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button dusk="deleteAlbum" class="btn btn-danger" type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
