@extends('layouts.layout')
@section('content')
    <h1 class="display-3">Albums aanpassen</h1>
    <div class="justify-content-between d-lg-flex mb-3">
        <a href="{{ route('galerij.create')}}" class="btn btn-primary" dusk="create">Creeër nieuw album</a>
    </div>
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Titel</td>
                <td>Beschrijving</td>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
                    <td>{{$album->id}}</td>
                    <td>{{$album->title}} </td>
                    <td>{{$album->description}}</td>
                    <td>{{$album->date}}</td>
                    <td>
                        <a href="{{ route('galerij.edit',$album->id)}}" class="btn btn-primary" dusk="editAlbum">Aanpassen</a>
                    </td>
                    <td>
                        <form action="{{ route('galerij.destroy', $album->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" dusk="deleteAlbum">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
