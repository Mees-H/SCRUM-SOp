@extends('layouts.layout') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editing Stock</h1>
 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br /> 
        @endif
        <form method="post" action="{{ route('events.update', $event->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
 
                <label for="title">Titel:</label>
                <input type="text" class="form-control" name="title" value="{{ $event->title }}" />
            </div>
 
            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="text" class="form-control" name="date" value="{{ $event->date }}" />
            </div>
 
            <div class="form-group">
                <label for="body" class="form-label">Tekst:</label>
                <textarea rows="5" class="form-control" name="body">{{ $event->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection