@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
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
                    @foreach($pages as $page)
                        <tr>
                            <td>{{$page->title}}</td>
                            @if($page->banner_image != '')
                            <td>
                                <div class="indexbanner-box">
                                    <img src="{{ asset('/img/banners/'.$page->banner_image) }}" class="indexbanner"/>
                                </div>
                            </td>
                            @else
                                <td></td>
                            @endif
                            <td>
                                <a href="{{ route('banners.edit', $page->id)}}" class="btn btn-primary">Bannerfoto aanpassen</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
    </div>
@endsection