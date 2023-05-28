@extends('layouts.layout')

@section('content')
    <object data="{{asset('files\avg.pdf')}}" type="application/pdf" width="100%" height="100%" style="height: 80vh">
        <div class="d-flex align-items-center flex-column-reverse" style="height: 60vh">
            <a class="btn btn-primary" href="/privacy/download">Download PDF</a>
        </div>
    </object>
@stop
