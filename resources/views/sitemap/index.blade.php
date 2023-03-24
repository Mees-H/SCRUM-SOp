@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Links</h1>
        <div>
            <a href="{{ route('links.create')}}" class="btn btn-primary mb-3">Creeër nieuwe links</a>
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
                    <td>Categorie</td>
                    <td>Functie</td>
                    <td>Naam</td>
                    <td>Verwijzing</td>
                </tr>
            </thead>
            <tbody>
                @foreach($sitemaps as $sitemap)
                    <tr class="text-break">
                        <td>{{$sitemap->id}}</td>
                        <td>{{$sitemap->categorie}}</td>
                        <td>{{$sitemap->functie}}</td>
                        <td>{{$sitemap->naam}}</td>
                        @if (str_contains($sitemap->verwijzing, '@'))
                        <td><a href="mailto:{{$sitemap->verwijzing}}">{{$sitemap->verwijzing}}</a></td>
                        @else
                        <td><a href="{{$sitemap->verwijzing}}">{{$sitemap->verwijzing}}</a></td>
                        @endif
                        <td>
                        </td>
                        <td>
                            <a href="{{ route('links.edit',$sitemap->id)}}" class="btn btn-primary">Aanpassen</a>
                        </td>
                        <td>
                            <form action="{{ route('links.destroy', $sitemap->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>

@endsection
