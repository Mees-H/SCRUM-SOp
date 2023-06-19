@extends('layouts.layout')

@section('content')
<h1 class="display-3">Paginabanners beheren</h1>  
<div class="container">
    @if(session()->get('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>   
    @endif
    <div class="row">
        <div class="col-md-12 text-center image-form">
            <x-banner-upload-form action="{{ route('banners.update', $page->id) }}" label="Upload Afbeelding Voor Banner" :page-id="$page->id" />
        </div>
    </div>
</div>
@endsection
