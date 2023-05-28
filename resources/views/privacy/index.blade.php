@extends('layouts.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mt-5">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li class="text-center">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($beschikbaar))
        <div class="alert alert-danger mt-5">
            <li class="text-center">{{ $beschikbaar }}</li>
        </div>
    @else
        <object data="{{asset('files\avg.pdf')}}" type="application/pdf" width="100%" height="100%" style="height: 80vh">
            <div class="d-flex align-items-center flex-column-reverse" style="height: 60vh">
                <a class="btn btn-primary" href="/privacy/download">Download PDF</a>
            </div>
        </object>
    @endif
@stop
