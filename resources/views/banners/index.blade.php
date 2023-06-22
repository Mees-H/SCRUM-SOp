@extends('layouts.layout')

@section('content')
    <h1 class="display-3">Paginabanners beheren</h1>
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pagina titels</th>
                <th>Banner</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Slider</td>
                <td>
                </td>
                <td>
                    <a class="btn btn-info" href="/slider" autofocus>Slider aanpassen</a>
                </td>
            </tr>
            @foreach($pages as $page)
                <tr>
                    <td>{{$page->title}}</td>
                    @if($page->banner_image != '')
                    <td>
                        <div class="indexbanner-box">
                            <img src="{{ asset('/img/banners/'.$page->banner_image) }}" class="indexbanner" dusk="banner" alt="{{ $page->title }} banner"/>
                        </div>
                    </td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        <form action="{{ route('banners.edit', $page->id)}}" method="GET">
                            @csrf
                            <input type="hidden" name="page_id" value="{{ $page->id }}">
                            <button dusk="{{ $page->title }}_banner_aanpassen" type="submit" class="btn btn-primary wide-button">Bannerfoto aanpassen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
